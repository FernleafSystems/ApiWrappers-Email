<?php

namespace FernleafSystems\Apis\Email\Mailchimp\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\Apis\Email\Mailchimp\Webhooks
 */
class Capture extends \FernleafSystems\Apis\Email\Common\Webhooks\Capture {
	/**
	 * @return WebhookVO
	 */
	public function capture() {
		return ( new WebhookVO() )->setRawData( $this->fromPost()->getRawData() );
	}
}