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