<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class Delete extends Base {

	use SubscriberAction;

	const REQUEST_METHOD = 'delete';

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getSubId() );
	}
}