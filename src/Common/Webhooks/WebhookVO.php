<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Webhooks;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\Common\Webhooks
 */
class WebhookVO {

	use DynProperties;

	public function isValid() :bool {
		return false;
	}
}