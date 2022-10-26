<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

class Delete extends Base {

	use SubscriberAction;

	const REQUEST_METHOD = 'delete';

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getSubId() );
	}
}