<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Webhooks
 */
class Capture extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\Capture {

	/**
	 * @return WebhookVO
	 */
	public function capture() {
		return ( new WebhookVO() )->applyFromArray( $this->fromInput()->getRawDataAsArray() );
	}
}