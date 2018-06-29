<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Delete extends Drip\Api {

	const REQUEST_METHOD = 'delete';

	/**
	 * IMPORTANT: this doesn't take into consideration that the API can also
	 * use a subscriber's ID instead of email. But we haven't coded for IDs (yet)
	 * @return array
	 */
	protected function getCriticalRequestItems() {
		return [ 'email' ];
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setParam( 'email', $sEmail );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'subscribers/%s', urlencode( $this->getStringParam( 'email' ) ) );
	}
}