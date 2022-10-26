<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

class Delete extends Base {

	protected function getUrlEndpoint() :string {
		return 'api/subscribers/delete.php';
	}
}