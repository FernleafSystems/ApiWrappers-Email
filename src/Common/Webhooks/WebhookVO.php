<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Webhooks;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Email\Common\Webhooks
 */
class WebhookVO {
	use StdClassAdapter;

	/**
	 * @return bool
	 */
	public function isValid() {
		return false;
	}
}