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
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setParam( 'email', $sEmail );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		if ( is_null( $this->getParam( 'email' ) ) ) {
			throw new \Exception( 'Email is not provided.' );
		}
		if ( !filter_var( $this->getParam( 'email' ), FILTER_VALIDATE_EMAIL ) ) {
			throw new \Exception( 'Email provided is not valid.' );
		}
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'subscribers/%s', urlencode( $this->getStringParam( 'email' ) ) );
	}
}