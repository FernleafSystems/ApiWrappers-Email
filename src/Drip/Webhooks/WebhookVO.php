<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Webhooks;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Webhooks
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\WebhookVO {

	/**
	 * @return string
	 */
	public function getAccountId() {
		return $this->getWebhookData()[ 'account_id' ];
	}

	/**
	 * @return array
	 */
	public function getSubscriberData() {
		return $this->getWebhookData()[ 'subscriber' ];
	}

	/**
	 * @return array
	 */
	public function getSubscriberCustomFields() {
		return $this->getSubscriberData()[ 'custom_fields' ];
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
	 * @return string
	 */
	public function getSubscriberStatus() {
		return $this->getSubscriberData()[ 'status' ];
	}

	/**
	 * @return array
	 */
	public function getSubscriberTags() {
		return $this->getSubscriberData()[ 'tags' ];
	}

	/**
	 * @return string
	 */
	public function getSubscriberUserId() {
		return $this->getSubscriberData()[ 'user_id' ];
	}

	/**
	 * @return array
	 */
	public function getWebhookData() {
		return $this->getArrayParam( 'data' );
	}

	/**
	 * @return string
	 */
	public function getEvent() {
		return $this->getStringParam( 'event' );
	}
}