<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

/**
 * Class OrderVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 * @property string  $id
 * @property string  $connectionid
 * @property string  $customerid
 * @property string  $externalid
 * @property string  $email
 * @property string  $currency
 * @property string  $orderNumber
 * @property string  $orderUrl
 * @property string  $orderDate
 * @property string  $totalPrice - must of smallest units, e.g $12 = 1200
 * @property string  $totalProducts
 * @property string  $source     - 1 to ensure automation is triggered
 * @property array[] $ecomOrderProducts
 */
class OrderVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->orderDate );
	}

	/**
	 * @return OrderProductVO[]
	 */
	public function getOrderProducts() {
		return array_map(
			function ( $aProduct ) {
				return ( new OrderProductVO() )->applyFromArray( $aProduct );
			},
			$this->ecomOrderProducts
		);
	}

	/**
	 * @param int|string $nTimestamp - unix timestamp or full string e.g. 2016-09-13T17:41:39-04:00
	 * @return $this
	 */
	public function setOrderDate( $nTimestamp ) {
		if ( is_int( $nTimestamp ) ) {
			$nTimestamp = date( 'c', $nTimestamp );
		}
		$this->orderDate = $nTimestamp;
		return $this;
	}
}