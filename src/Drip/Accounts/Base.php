<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class Base extends Drip\Api {

	const ENDPOINT_KEY = 'accounts';

	protected function getVO():AccountVO {
		return new AccountVO();
	}
}