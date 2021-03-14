<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Users
 */
class Delete extends Base {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return 'api/subscribers/delete.php';
	}
}