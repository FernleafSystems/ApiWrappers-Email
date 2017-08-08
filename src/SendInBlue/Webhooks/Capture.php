<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\Apis\Email\SendInBlue\Webhooks
 */
class Capture extends \FernleafSystems\Apis\Email\Common\Webhooks\Capture {
	/**
	 * @return WebhookVO
	 */
	public function capture() {
		return ( new WebhookVO() )->setRawData( $this->fromInput()->getRawData() );
	}
}