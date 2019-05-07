<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

/**
 * Class Pause
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class Pause extends Base {

	use CampaignAction;

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/pause', parent::getUrlEndpoint(), $this->getCampaignId() );
	}
}