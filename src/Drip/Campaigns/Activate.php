<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

/**
 * Class Activate
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class Activate extends Base {

	use CampaignAction;

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/activate', parent::getUrlEndpoint(), $this->getCampaignId() );
	}
}