<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 * @property string $id
 * @property string $connectionid
 * @property string $externalid
 * @property string $email
 * @property string $totalRevenue
 * @property string $totalOrders
 * @property string $totalProducts
 * @property string $avgRevenuePerOrder
 * @property string $avgProductCategory
 * @property string $tstamp
 * @property string $acceptsMarketing - i.e. 0 / 1
 */
class OrderVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->tstamp );
	}
}