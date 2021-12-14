<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class UnsubscribeAll extends Base {

	use SubscriberAction;

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/unsubscribe_all', parent::getUrlEndpoint(), $this->getSubId() );
	}
}