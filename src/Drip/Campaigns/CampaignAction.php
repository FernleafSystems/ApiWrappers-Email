<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

/**
 * Trait CampaignAction
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
trait CampaignAction {

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setCampaignId( $sId ) {
		$this->campaign_id = $sId;
		return $this;
	}

	/**
	 * @return string - url-encoded
	 */
	private function getCampaignId() {
		return rawurlencode( $this->campaign_id );
	}
}