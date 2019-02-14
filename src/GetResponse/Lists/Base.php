<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Lists;

use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Lists
 */
class Base extends GetResponse\Api {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'campaigns';
	}
}