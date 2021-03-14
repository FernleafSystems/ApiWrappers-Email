<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
class Delete extends Base {

	use SubscriberAction;
	const REQUEST_METHOD = 'delete';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getSubId() );
	}
}