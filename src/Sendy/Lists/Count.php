<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Lists;

use FernleafSystems\ApiWrappers\Email\Sendy\Api;

class Count extends Api {

	protected function getUrlEndpoint() :string {
		return 'api/subscribers/active-subscriber-count.php';
	}
}