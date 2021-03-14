<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Purchases;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Purchases
 */
class Base extends Drip\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setSubscriberEmail( $sEmail ) {
		$this->subscriber_email = $sEmail;
		return $this;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( 'subscribers/%s/purchases', urlencode( $this->subscriber_email ) );
	}
}