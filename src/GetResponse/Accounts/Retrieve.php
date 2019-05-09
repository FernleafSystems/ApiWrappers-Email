<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Accounts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Accounts
 */
class Retrieve extends \FernleafSystems\ApiWrappers\Email\GetResponse\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return AccountVO|mixed
	 */
	protected function getVO() {
		return new AccountVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'accounts';
	}
}