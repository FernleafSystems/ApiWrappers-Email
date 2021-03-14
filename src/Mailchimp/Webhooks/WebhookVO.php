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
	public function getEventAction() {
		return $this->getSubscriberDataItem( 'action' ); //unsub/delete
	}

	/**
	 * @return string
	 */
	public function getEventReason() {
		return $this->getSubscriberDataItem( 'reason' ); //manual/abuse
	}

	/**
	 * @return string
	 */
	public function getEvent() {
		return $this->type;
	}

	/**
	 * @param bool $bAsTimestamp
	 * @return int|string
	 */
	public function getFiredAt( $bAsTimestamp = true ) {
		$sTimestamp = $this->fired_at;
		return $bAsTimestamp ? strtotime( $sTimestamp ) : $sTimestamp;
	}

	/**
	 * @return string
	 */
	public function getListId() {
		return $this->getSubscriberDataItem( 'list_id' );
	}

	/**
	 * @return array
	 */
	public function getSubscriberCustomFields() { // MERGE FIELD
		return $this->getSubscriberDataItem( 'merges' );
	}

	/**
	 * @alias
	 * @return array
	 */
	public function getSubscriberData() {
		return $this->getWebhookData();
	}

	/**
	 * @param string $sKey
	 * @return mixed|null
	 */
	public function getSubscriberDataItem( $sKey ) {
		$aData = $this->getSubscriberData();
		return isset( $aData[ $sKey ] ) ? $aData[ $sKey ] : null;
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmail() {
		return $this->getSubscriberDataItem( 'email' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmailNew() {
		return $this->getSubscriberDataItem( 'new_email' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmailOld() {
		return $this->getSubscriberDataItem( 'old_email' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmailType() {
		return $this->getSubscriberDataItem( 'email_type' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberIpOptin() {
		return $this->getSubscriberDataItem( 'ip_opt' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberIpSignup() {
		return $this->getSubscriberDataItem( 'ip_signup' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberId() {
		return $this->getSubscriberDataItem( 'id' );
	}

	/**
	 * @return array
	 */
	public function getWebhookData() {
		return $this->data;
	}

	/**
	 * @return bool
	 */
	public function isEvent_CampaignStatus() {
		return $this->isEvent( 'campaign' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_Cleaned() {
		return $this->isEvent( 'cleaned' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_ProfileUpdate() {
		return $this->isEvent( 'profile' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_Subscribe() {
		return $this->isEvent( 'subscribe' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_Unsubscribe() {
		return $this->isEvent( 'unsubscribe' );
	}

	/**
	 * @param string $sType
	 * @return bool
	 */
	public function isEvent( $sType ) {
		return ( $this->getEvent() == $sType );
	}

	/**
	 * @return bool
	 */
	public function isEventUserSubscribe() {
		return $this->isEvent_Subscribe();
	}

	public function isValid() :bool {
		return !empty( $this->getEvent() );
	}

	/**
	 * @return bool
	 * @deprecated
	 */
	public function isEventUserUnsubscribe() {
		return $this->isEvent_Unsubscribe();
	}
}