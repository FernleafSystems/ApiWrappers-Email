<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Tags;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Tags
 */
class Base extends Drip\Api {

	const ENDPOINT_KEY = 'tags';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}