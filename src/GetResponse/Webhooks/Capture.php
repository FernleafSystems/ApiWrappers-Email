<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\ApiWrappers\Email\Drip\Webhooks
 */
class Capture extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\Capture {

	/**
	 * @return WebhookVO
	 */
	public function capture() {
		return ( new WebhookVO() )->applyFromArray( $_GET );
	}
}