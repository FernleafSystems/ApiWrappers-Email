<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Batches;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Batches
 */
abstract class Base extends Drip\Api {

	const ENDPOINT_KEY = 'batches';

	/**
	 * @return string
	 */
	protected function getRequestPayloadDataKey() {
		return static::ENDPOINT_KEY;
	}

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}