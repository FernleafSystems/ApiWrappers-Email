<?php

namespace FernleafSystems\Apis\Email\Drip\Users;

use FernleafSystems\Apis\Email\Drip;

class Retrieve extends Drip\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}