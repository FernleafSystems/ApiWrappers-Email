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
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getSubscriberEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * @return int
	 */
	public function getEventTimestamp() {
		return $this->ts_event;
	}

	/**
	 * @return string
	 */
	public function getEventReason() {
		return $this->reason;
	}

	/**
	 * @return int
	 */
	public function getFiredAt() {
		$nTs = $this->ts_sent;
		if ( empty( $nTs ) ) {
			$nTs = strtotime( $this->date );
		}
		return $nTs;
	}

	/**
	 * @return string
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @return int[]
	 */
	public function getListIds() {
		return $this->list_id;
	}

	/**
	 * @return bool
	 * @deprecated
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
	public function isValid() :bool {
		return !empty( $this->getWebhookId() );
	}
}