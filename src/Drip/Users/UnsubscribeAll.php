<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

class UnsubscribeAll extends Base {

	use SubscriberAction;

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s/unsubscribe_all', parent::getUrlEndpoint(), $this->getSubId() );
	}
}