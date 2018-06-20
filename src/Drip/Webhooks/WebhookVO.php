<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Webhooks;

use FernleafSystems\ApiWrappers\Email\Drip\Users\MemberVO;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Webhooks
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
		return $this->getStringParam( 'event' );
	}

	/**
	 * @return array
	 */
	public function getEventProperties() {
		return $this->getWebhookDataItem( 'properties' );
	}

	/**
	 * @return MemberVO
	 */
	public function getSubscriber() {
		return ( new MemberVO() )->applyFromArray( $this->getWebhookDataItem( 'subscriber' ) );
	}

	/**
	 * @return array
	 */
	public function getWebhookData() {
		return $this->getArrayParam( 'data' );
	}

	/**
	 * @return mixed|null`
	 */
	public function getWebhookDataItem( $sKey ) {
		$aD = $this->getArrayParam( 'data' );
		return isset( $aD[ $sKey ] ) ? $aD[ $sKey ] : null;
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
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return array
	 */
	public function getSubscriberData() {
		return $this->getWebhookDataItem( 'subscriber' );
	}

	/**
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return array
	 */
	public function getSubscriberCustomFields() {
		return $this->getSubscriber()->getCustomFields();
	}

	/**
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return string
	 */
	public function getSubscriberEmail() {
		return $this->getSubscriber()->getEmail();
	}

	/**
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return string
	 */
	public function getSubscriberId() {
		return $this->getSubscriber()->getId();
	}

	/**
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return string
	 */
	public function getSubscriberStatus() {
		return $this->getSubscriber()->getStatus();
	}

	/**
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return array
	 */
	public function getSubscriberTags() {
		return $this->getSubscriber()->getTags();
	}

	/**
	 * @deprecated just use the getSubscriber() to get the VO
	 * @return string
	 */
	public function getSubscriberUserId() {
		return $this->getSubscriber()->getUserId();
	}
}