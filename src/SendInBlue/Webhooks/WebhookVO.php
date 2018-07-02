<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Webhooks;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Webhooks
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\WebhookVO {

	/**
	 * @return int
	 */
	public function getWebhookId() {
		return $this->getParam( 'id' );
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * @return string
	 */
	public function getEvent() {
		return $this->getParam( 'event' );
	}

	/**
	 * @return int
	 */
	public function getEventTimestamp() {
		return $this->getParam( 'ts_event' );
	}

	/**
	 * @return string
	 */
	public function getEventReason() {
		return $this->getStringParam( 'reason' );
	}

	/**
	 * @return int
	 */
	public function getFiredAt() {
		$nTs = $this->getParam( 'ts_sent' );
		if ( empty( $nTs ) ) {
			$nTs = strtotime( $this->getStringParam( 'date' ) );
		}
		return $nTs;
	}

	/**
	 * @return string
	 */
	public function getKey() {
		return $this->getStringParam( 'key' );
	}

	/**
	 * @return int[]
	 */
	public function getListIds() {
		return $this->getArrayParam( 'list_id' );
	}

	/**
	 * @deprecated
	 * @return bool
	 */
	public function isListAddition() {
		return $this->isEvent_ListAddition();
	}

	/**
	 * @return bool
	 */
	public function isEvent_ListAddition() {
		return ( $this->getEvent() == 'list_addition' );
	}

	/**
	 * @return bool
	 */
	public function isEvent_Unsubscribe() {
		return ( $this->getEvent() == 'unsubscribe' );
	}

	/**
	 * @return bool
	 */
	public function isValid() {
		return !empty( $this->getWebhookId() );
	}
}