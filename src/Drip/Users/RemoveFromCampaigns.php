<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class UnsubscribeAll
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class RemoveFromCampaigns extends Base {

	use SubscriberAction;

	/**
	 * Defaults to all campaigns if none specified
	 * @param string $sCampaignId
	 * @return $this
	 */
	public function setCampaignId( $sCampaignId ) {
		return $this->setRequestDataItem( 'campaign_id', $sCampaignId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s/remove', parent::getUrlEndpoint(), $this->getSubId() );
	}
}