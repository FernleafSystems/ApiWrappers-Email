<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Delete extends Base {

	use SubscriberAction;
	const REQUEST_METHOD = 'delete';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getSubId() );
	}
}