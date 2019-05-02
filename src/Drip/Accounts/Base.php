<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class Base extends Drip\Api {

	/**
	 * @return AccountVO
	 */
	protected function getVO() {
		return new AccountVO();
	}
}