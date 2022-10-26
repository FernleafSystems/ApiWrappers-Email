<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

use FernleafSystems\ApiWrappers\Email\Drip;

class Base extends Drip\Api {

	const ENDPOINT_KEY = 'campaigns';

	protected function getVO() :CampaignVO {
		return new CampaignVO();
	}

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}