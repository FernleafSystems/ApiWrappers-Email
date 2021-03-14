<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Webhooks;

use FernleafSystems\ApiWrappers\Email\Drip\People\PeopleVO;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Webhooks
 * @property string $event
 * @property array  $data
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\WebhookVO {

	/**
	 * @return string
	 */
	public function getAccountId() {
		return $this->getWebhookDataItem( 'account_id' );
	}

	/**
	 * @return string
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * @return array
	 */
	public function getEventProperties() {
		return $this->getWebhookDataItem( 'properties' );
	}

	/**
	 * @return PeopleVO
	 */
	public function getSubscriber() {
		return ( new PeopleVO() )->applyFromArray( $this->getWebhookDataItem( 'subscriber' ) );
	}

	/**
	 * @return array
	 */
	public function getWebhookData() {
		return $this->data;
	}

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	public function getWebhookDataItem( $key ) {
		return $this->data[ $key ] ?? null;
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

	/**
	 * @return bool
	 */
	public function isValid() :bool {
		return !empty( $this->getAccountId() );
	}

	/**
	 * @return array
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberData() {
		return $this->getWebhookDataItem( 'subscriber' );
	}

	/**
	 * @return array
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberCustomFields() {
		return $this->getSubscriber()->custom_fields;
	}

	/**
	 * @return string
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberEmail() {
		return $this->getSubscriber()->email;
	}

	/**
	 * @return string
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberId() {
		return $this->getSubscriber()->id;
	}

	/**
	 * @return string
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberStatus() {
		return $this->getSubscriber()->status;
	}

	/**
	 * @return array
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberTags() {
		return $this->getSubscriber()->tags;
	}

	/**
	 * @return string
	 * @deprecated just use the getSubscriber() to get the VO
	 */
	public function getSubscriberUserId() {
		return $this->getSubscriber()->user_id;
	}
}