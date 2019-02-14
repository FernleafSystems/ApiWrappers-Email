<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Tags;

use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Tags
 */
class Base extends GetResponse\Api {

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'tags';
	}
}