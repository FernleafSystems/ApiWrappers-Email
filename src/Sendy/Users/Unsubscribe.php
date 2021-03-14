<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

/**
 * Class Unsubscribe
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Users
 */
class Unsubscribe extends Base {

	const LIST_ID_KEY = 'list';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return 'unsubscribe';
	}
}