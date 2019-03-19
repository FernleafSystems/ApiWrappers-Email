<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Webhooks;

/**
 * https://www.activecampaign.com/blog/working-with-webhook-data/
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Webhooks
 * @property string $type
 * @property string $date_type
 * @property string $initiated_from
 * @property string $initiated_by
 * @property string $list
 * @property array  $contact
 * @property array  $subscriber
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Email\Common\Webhooks\WebhookVO {
}