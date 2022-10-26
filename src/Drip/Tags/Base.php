<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Tags;

use FernleafSystems\ApiWrappers\Email\Drip;

class Base extends Drip\Api {

	const ENDPOINT_KEY = 'tags';

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}