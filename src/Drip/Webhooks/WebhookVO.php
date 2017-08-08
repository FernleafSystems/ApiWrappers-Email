<?php

namespace FernleafSystems\Apis\Email\Drip\Webhooks;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

class WebhookVO extends \FernleafSystems\Apis\Email\Common\Webhooks\WebhookVO {

	use StdClassAdapter;

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
	 * @return int
	 */
	public function getEvent() {
		return $this->getStringParam( 'event' );
	}
}