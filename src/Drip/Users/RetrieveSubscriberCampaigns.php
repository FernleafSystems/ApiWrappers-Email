<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class RetrieveCampaigns
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class RetrieveSubscriberCampaigns extends Base {

	use SubscriberAction;
	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return array|null
	 */
	public function byEmail( $sEmail ) {
		return $this->setEmail( $sEmail )->retrieve();
	}

	/**
	 * @return array|null
	 */
	public function retrieve() {
		return $this->req()->isLastRequestSuccess() ? $this->getDecodedResponseBody() : null;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/campaign_subscriptions', parent::getUrlEndpoint(), $this->getSubId() );
	}
}