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
		return $this->setParam( 'subscriber_email', $sEmail );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'subscribers/%s/purchases', urlencode( $this->getParam( 'subscriber_email' ) ) );
	}
}