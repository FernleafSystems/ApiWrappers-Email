<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class UnsubscribeAll
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class UnsubscribeAll extends Base {

	use SubscriberAction;

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/unsubscribe_all', parent::getUrlEndpoint(), $this->getSubId() );
	}
}