<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Webhooks
 */
class Capture extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\Capture {
	/**
	 * @return WebhookVO
	 */
	public function capture() {
		return ( new WebhookVO() )->applyFromArray( $this->fromPost()->getRawDataAsArray() );
	}
}