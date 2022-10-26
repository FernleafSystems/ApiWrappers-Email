<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class UnsubscribeAll extends Base {

	use SubscriberAction;

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s/unsubscribe_all', parent::getUrlEndpoint(), $this->getSubId() );
	}
}