<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

class Unsubscribe extends Base {

	const LIST_ID_KEY = 'list';

	protected function getUrlEndpoint() :string {
		return 'unsubscribe';
	}
}