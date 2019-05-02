<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity\Order;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class OrderVO
 * https://developer.drip.com/#order-activity
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 * @property string  $order_id         - internal order ID
 * @property string  $order_public_id  - customer's public order ID
 * @property string  $person_id        - unique id of user at Drip (not your store)
 * @property string  $email
 * @property string  $provider
 * @property string  $action           - placed, updated, paid, fulfilled, refunded, or canceled
 * @property string  $currency         - ISO3 e.g. USD, GBP, EUR
 * @property string  $order_url
 * @property string  $occurred_at      - ISO 8601; use setDateAt() to get this right
 * @property float   $grand_total      - taking into account all costs/discounts
 * @property float   $total_discounts
 * @property float   $total_taxes
 * @property float   $total_fees
 * @property float   $total_shipping
 * @property float   $refund_amount
 * @property array[] $items
 */
class OrderVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @param ItemVO $oItem
	 * @return $this
	 */
	public function addOrderItem( ItemVO $oItem ) {
		if ( !is_array( $this->items ) ) {
			$this->items = [];
		}
		$this->items[] = $oItem->getRawDataAsArray();
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDateAsTs() {
		return strtotime( $this->occurred_at );
	}

	/**
	 * @return ItemVO[]
	 */
	public function getOrderItems() {
		return array_map(
			function ( $aProduct ) {
				return ( new ItemVO() )->applyFromArray( $aProduct );
			},
			$this->items
		);
	}

	/**
	 * @param int $nTs - unix timestamp
	 * @return $this
	 */
	public function setDateAt( $nTs ) {
		$this->occurred_at = Drip\Api::convertToStandardDateFormat( $nTs );
		return $this;
	}
}