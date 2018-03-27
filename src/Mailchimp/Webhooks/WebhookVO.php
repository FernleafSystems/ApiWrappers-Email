<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Webhooks;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Webhooks
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\WebhookVO {

	/**
	 * @return string
	 */
	public function getEventType() {
		return $this->getStringParam( 'type' );
	}

	/**
	 * @return int
	 */
	public function getFiredAt() {
		return strtotime( $this->getStringParam( 'fired_at' ) );
	}

	/**
	 * @return array
	 */
	public function getSubscriberCustomFields() { // MERGE FIELD
		return $this->getSubscriberData()[ 'merges' ];
	}

	/**
	 * @alias
	 * @return array
	 */
	public function getSubscriberData() {
		return $this->getWebhookData();
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmail() {
		return $this->getSubscriberData()[ 'email' ];
	}

	/**
	 * @return string
	 */
	public function getSubscriberId() {
		return $this->getSubscriberData()[ 'id' ];
	}

	/**
	 * @return array
	 */
	public function getWebhookData() {
		return $this->getArrayParam( 'data' );
	}

	/**
	 * @return bool
	 */
	public function isEventUserSubscribe() {
		return ( $this->getEventType() == 'subscribe' );
	}
}