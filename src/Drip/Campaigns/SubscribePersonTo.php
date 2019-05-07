<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

/**
 * Class SubscribePersonTo
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class SubscribePersonTo extends Base {

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setCampaignId( $sId ) {
		return $this->setParam( 'campaign_id', $sId );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

	/**
	 * @param int $nIndex
	 * @return $this
	 */
	public function setStartingEmailIndex( $nIndex ) {
		return $this->setRequestDataItem( 'starting_email_index', $nIndex );
	}

	/**
	 * @return string[]
	 */
	protected function getCriticalRequestItems() {
		return [ 'email' ];
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/subscribers', parent::getUrlEndpoint(), $this->getParam( 'campaign_id' ) );
	}
}