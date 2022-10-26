<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Webhooks;

use FernleafSystems\Utilities\Data\Adapter\DynPropertiesClass;

class WebhookVO extends DynPropertiesClass {

	/**
	 * @return bool
	 */
	public function isValid() {
		return false;
	}
}