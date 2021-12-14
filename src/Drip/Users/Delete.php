<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

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