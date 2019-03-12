<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 * @property string $id
 * @property string $orderid
 * @property string $connectionid
 * @property string $externalid
 * @property string $email
 * @property string $name
 * @property string $price
 * @property string $quantity
 * @property string $category
 * @property string $tstamp
 */
class OrderProductVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->tstamp );
	}
}