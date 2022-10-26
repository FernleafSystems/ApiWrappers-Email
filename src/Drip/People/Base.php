<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

use FernleafSystems\ApiWrappers\Email\Drip;

class Base extends Drip\Api {

	const ENDPOINT_KEY = 'subscribers';

	protected function getVO() :PeopleVO {
		return new PeopleVO();
	}

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}