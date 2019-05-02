<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Base extends Drip\Api {

	/**
	 * @return PeopleVO
	 */
	protected function getVO() {
		return new PeopleVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}