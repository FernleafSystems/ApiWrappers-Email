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
	public function getEmailAddress() {
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