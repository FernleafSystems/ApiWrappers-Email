<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use ActiveCampaign\Common\Pagination;

	/**
	 * @return OrderVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return static::ENDPOINT_KEY.'s';
	}
}