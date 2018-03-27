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
	 * @return string
	 */
	public function getEventReason() {
		return $this->getStringParam( 'reason' );
	}

	/**
	 * @param bool $bAsTimestamp
	 * @return int|string
	 */
	public function getFiredAt( $bAsTimestamp = true ) {
		$sTimestamp = $this->getStringParam( 'date' );
		return $bAsTimestamp ? strtotime( $sTimestamp ) : $sTimestamp;
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
	 * @return bool
	 */
	public function isListAddition() {
		return ( $this->getEvent() == 'list_addition' );
	}
}