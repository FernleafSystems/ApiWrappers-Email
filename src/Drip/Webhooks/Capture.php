<?php

namespace FernleafSystems\Apis\Email\Drip\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\Apis\Email\Drip\Webhooks
 */
class Capture extends \FernleafSystems\Apis\Email\Common\Webhooks\Capture {
	/**
	 * @return WebhookVO
	 */
	public function capture() {
		return ( new WebhookVO() )->setRawData( $this->fromInput()->getRawData() );
	}
}