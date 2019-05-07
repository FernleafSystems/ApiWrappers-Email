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
		return $this->setParam( 'campaign_id', $sId );
	}

	/**
	 * @return string - url-encoded
	 */
	private function getCampaignId() {
		return rawurlencode( $this->getStringParam( 'campaign_id' ) );
	}
}