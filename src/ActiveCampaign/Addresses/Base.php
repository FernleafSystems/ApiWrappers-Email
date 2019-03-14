<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses
 */
class Base extends ActiveCampaign\Api {

	const ENDPOINT_KEY = 'address';

	/**
	 * @return AddressVO
	 */
	protected function getVO() {
		return new AddressVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return static::ENDPOINT_KEY.'es';
	}
}