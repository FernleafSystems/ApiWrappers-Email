<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

class Activate extends Base {

	use CampaignAction;

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s/activate', parent::getUrlEndpoint(), $this->getCampaignId() );
	}
}