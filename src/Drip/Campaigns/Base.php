<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class Base extends Drip\Api {

	const ENDPOINT_KEY = 'campaigns';

	/**
	 * @return CampaignVO
	 */
	protected function getVO() {
		return new CampaignVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return static::ENDPOINT_KEY;
	}
}