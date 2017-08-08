<?php

namespace FernleafSystems\Apis\Email\Drip\Users;

use FernleafSystems\Apis\Email\Drip;

/**
 * Class RetrieveAll
 * @package FernleafSystems\Apis\Email\Drip\Users
 */
class RetrieveAll extends Drip\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}