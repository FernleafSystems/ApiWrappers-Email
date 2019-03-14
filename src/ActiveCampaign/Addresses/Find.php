<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use ActiveCampaign\Common\Pagination;

	/**
	 * Note that the information supplied for each contact is lighter than if you retrieve an
	 * individual.
	 * @return AddressVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return static::ENDPOINT_KEY.'es';
	}
}