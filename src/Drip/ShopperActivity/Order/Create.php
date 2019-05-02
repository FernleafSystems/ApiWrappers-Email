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
	 * @param string $sVal
	 * @return $this
	 */
	public function setAction( $sVal ) {
		return $this->setRequestDataItem( 'action', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setEmail( $sVal ) {
		return $this->setRequestDataItem( 'provider', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setProvider( $sVal ) {
		return $this->setRequestDataItem( 'provider', $sVal );
	}

	/**
	 * @param string $sVal - your internal order ID
	 * @return $this
	 */
	public function setInternalOrderId( $sVal ) {
		return $this->setRequestDataItem( 'order_id', $sVal );
	}

	/**
	 * @param string $sVal - your internal order ID
	 * @return $this
	 */
	public function setPublicOrderId( $sVal ) {
		return $this->setRequestDataItem( 'order_public_id', $sVal );
	}

	/**
	 * @param string $nVal
	 * @return $this
	 */
	public function setRefundAmount( $nVal ) {
		return $this->setRequestDataItem( 'refund_amount', $nVal );
	}

	/**
	 * @param string $nVal
	 * @return $this
	 */
	public function setTotal_Discounts( $nVal ) {
		return $this->setRequestDataItem( 'total_discounts', $nVal );
	}

	/**
	 * @param string $nVal
	 * @return $this
	 */
	public function setTotal_Fees( $nVal ) {
		return $this->setRequestDataItem( 'total_fees', $nVal );
	}

	/**
	 * @param string $nVal
	 * @return $this
	 */
	public function setTotal_Shipping( $nVal ) {
		return $this->setRequestDataItem( 'total_taxes', $nVal );
	}

	/**
	 * @param string $nVal
	 * @return $this
	 */
	public function setTotal_GrandTotal( $nVal ) {
		return $this->setRequestDataItem( 'grand_total', $nVal );
	}

	/**
	 * @param string $nVal
	 * @return $this
	 */
	public function setTotal_Taxes( $nVal ) {
		return $this->setRequestDataItem( 'total_taxes', $nVal );
	}

	/**
	 * @param string $sVal - ISO3 e.g. EUR, GBP, USD
	 * @return $this
	 */
	public function setCurrency( $sVal ) {
		return $this->setRequestDataItem( 'currency', strtoupper( $sVal ) );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setOrderUrl( $sVal ) {
		return $this->setRequestDataItem( 'order_url', $sVal );
	}

	/**
	 * @param int $nTimestamp
	 * @return $this
	 */
	public function setDateAt( $nTimestamp ) {
		return $this->setRequestDataItem( 'occurred_at', $this->convertToStandardDateFormat( $nTimestamp ) );
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
}