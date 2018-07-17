<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

class Update extends Create {

	const REQUEST_METHOD = 'put';

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