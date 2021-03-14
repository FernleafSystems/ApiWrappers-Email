<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Accounts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Accounts
 */
class Retrieve extends \FernleafSystems\ApiWrappers\Email\GetResponse\Api {

	const REQUEST_METHOD = 'get';

	protected function getVO() :AccountVO {
		return new AccountVO();
	}

	protected function getUrlEndpoint() :string {
		return 'accounts';
	}
}