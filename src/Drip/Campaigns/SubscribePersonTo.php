<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

/**
 * Class SubscribePersonTo
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class SubscribePersonTo extends Base {

	use CampaignAction;

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
		return sprintf( '%s/%s/subscribers', parent::getUrlEndpoint(), $this->getCampaignId() );
	}

	/**
	 * @return string
	 */
	protected function getRequestPayloadDataKey() {
		return 'subscribers';
	}
}