<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

/**
 * Class Status
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Users
 */
class Status extends Base {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return 'api/subscribers/subscription-status.php';
	}
}