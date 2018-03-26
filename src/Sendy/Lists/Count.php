<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Lists;

use FernleafSystems\ApiWrappers\Email\Sendy\Api;

/**
 * Class Count
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Lists
 */
class Count extends Api {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'api/subscribers/active-subscriber-count.php';
	}
}