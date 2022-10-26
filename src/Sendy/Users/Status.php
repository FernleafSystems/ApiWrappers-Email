<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

class Status extends Base {

	protected function getUrlEndpoint() :string {
		return 'api/subscribers/subscription-status.php';
	}
}