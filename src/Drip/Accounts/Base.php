<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip;

class Base extends Drip\Api {

	const ENDPOINT_KEY = 'accounts';

	/**
	 * @return AccountVO
	 */
	protected function getVO() {
		return new AccountVO();
	}
}