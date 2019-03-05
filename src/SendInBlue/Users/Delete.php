<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue;

class Delete extends SendInBlue\Api {

	const REQUEST_METHOD = 'delete';

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
		return sprintf( 'contacts/%s', rawurlencode( $this->getStringParam( 'email' ) ) );
	}
}