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

	/**
	 * https://developer.drip.com/#webhook-events
	 * @param string $sEvent
	 * @return bool
	 */
	public function isEvent( $sEvent ) {
		return $this->getEvent() == $sEvent;
	}

	/**
	 * @return bool
	 */
	public function isEvent_AppliedTag() {
		return $this->isEvent( 'subscriber.applied_tag' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_Deleted() {
		return $this->isEvent( 'subscriber.deleted' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_PerformedEvent() {
		return $this->isEvent( 'subscriber.performed_custom_event' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_RemovedFromCampaign() {
		return $this->isEvent( 'subscriber.removed_from_campaign' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_RemovedTag() {
		return $this->isEvent( 'subscriber.removed_tag' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_UnsubscribedAll() {
		return $this->isEvent( 'subscriber.unsubscribed_all' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_UnsubscribedCampaign() {
		return $this->isEvent( 'subscriber.unsubscribed_from_campaign' );
	}
}