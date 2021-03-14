<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses
 */
class Base extends ActiveCampaign\Api {

	const ENDPOINT_KEY = 'address';

	protected function getVO():AddressVO {
		return new AddressVO();
	}

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY.'es';
	}
}