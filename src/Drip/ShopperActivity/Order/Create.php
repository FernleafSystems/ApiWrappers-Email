<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity\Order;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity\Order
 */
class Create extends Drip\ShopperActivity\BaseShopperActivity {

	/**
	 * @param ItemVO $oItem
	 * @return Create
	 */
	public function addItem( ItemVO $oItem ) {
		$aItems = $this->getRequestDataItem( 'items' );
		if ( !is_array( $aItems ) ) {
			$aItems = [];
		}
		$aItems[] = $oItem->getRawDataAsArray();
		return $this->setRequestDataItem( 'items', $aItems );
	}

	/**
	 * This will overwrite all previously set order details
	 * @param OrderVO $oOrder
	 * @return $this
	 */
	public function setOrder( OrderVO $oOrder ) {
		return $this->setRequestData( $oOrder->getRawDataAsArray() );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		$this->isActionValid();
	}

	protected function preFlight() {
		$this->castRequestParameters();
	}

	/**
	 * DRIP Shopper API is unforgiving with variable types and will error when prices are sent as
	 * strings and certain string fields are sent as ints, so before sending, cast everything that may
	 * cause errors.
	 */
	private function castRequestParameters() {
		$aOrderFieldCallbacks = [
			'floatval' => [
				'grand_total',
				'total_discounts',
				'total_fees',
				'total_shipping',
				'refund_amount',
				'total_taxes'
			],
			'strval'   => [ 'order_public_id' ],
		];

		$aReqData = $this->getRequestData();
		foreach ( $aOrderFieldCallbacks as $cCallback => $aOrderFields ) {
			foreach ( $aOrderFields as $sField ) {
				if ( isset( $aReqData[ $sField ] ) ) {
					$aReqData[ $sField ] = call_user_func( $cCallback, $aReqData[ $sField ] );
				}
			}
		}

		$aItemFieldCallbacks = [
			'floatval' => [ 'price', 'taxes', 'total', 'discount', 'fees', 'shipping' ],
			'intval'   => [ 'quantity' ],
			'strval'   => [ 'product_id' ],
		];
		$aReqData[ 'items' ] = array_map(
			function ( $aItemData ) use ( $aItemFieldCallbacks ) {
				foreach ( $aItemFieldCallbacks as $cCallback => $aFields ) {
					foreach ( $aFields as $sField ) {
						if ( isset( $aItemData[ $sField ] ) ) {
							$aItemData[ $sField ] = call_user_func( $cCallback, $aItemData[ $sField ] );
						}
					}
				}
				return $aItemData;
			},
			$aReqData[ 'items' ]
		);

		$this->setRequestData( $aReqData, false );
	}

	/**
	 * @return string[]
	 */
	protected function getCriticalRequestItems() {
		return [ 'provider', 'email', 'action' ];
	}

	/**
	 * @throws \InvalidArgumentException
	 */
	private function isActionValid() {
		$aPossibleActions = [
			'placed',
			'updated',
			'paid',
			'fulfilled',
			'refunded',
			'canceled',
		];
		$sAction = $this->getRequestDataItem( 'action' );
		if ( !in_array( $this->getRequestDataItem( 'action' ), $aPossibleActions ) ) {
			throw new \InvalidArgumentException( sprintf( 'Invalid action provided "%s"', $sAction ) );
		}
		return true;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return parent::getUrlEndpoint().'/order';
	}
}