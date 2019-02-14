<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
class Base extends GetResponse\Api {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'contacts';
	}
}