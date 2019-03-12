<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

/**
 * Class OrderVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 * @property string           $id
 * @property string           $connectionid
 * @property string           $customerid
 * @property string           $externalid
 * @property string           $email
 * @property string           $currency
 * @property string           $orderNumber
 * @property string           $orderUrl
 * @property string           $orderDate
 * @property string           $totalPrice
 * @property string           $totalProducts
 * @property OrderProductVO[] $ecomOrderProducts
 */
class OrderVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->orderDate );
	}
}