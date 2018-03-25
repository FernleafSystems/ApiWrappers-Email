<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

/**
 * Class Unsubscribe
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Users
 */
class Unsubscribe extends Base {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'unsubscribe';
	}
}