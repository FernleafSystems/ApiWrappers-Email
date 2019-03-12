<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Common\Pagination;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use Pagination;

	/**
	 * @return CustomerVO[]
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