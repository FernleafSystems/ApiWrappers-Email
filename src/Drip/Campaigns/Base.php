<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class Base extends Drip\Api {

	const ENDPOINT_KEY = 'campaigns';

	protected function getVO() :CampaignVO {
		return new CampaignVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}