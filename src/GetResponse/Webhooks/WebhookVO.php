<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Webhooks;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Webhooks
 * @property string account_login
 * @property string contact_email
 * @property string action
 * @property string message_name
 * @property string message_subject
 * @property string contact_name
 * @property string campaign_name
 * @property string CONTACT_ID
 * @property string ACCOUNT_ID
 * @property string CAMPAIGN_ID
 * @property string MESSAGE_ID
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\WebhookVO {

	public function isValid() :bool {
		return !empty( $this->getRawData() );
	}
}