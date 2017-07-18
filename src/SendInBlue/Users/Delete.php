<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

use FernleafSystems\Apis\Email\SendInBlue\Api;

class Delete extends Api {

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
		return sprintf( 'user/%s', rawurlencode( $this->getStringParam( 'email' ) ) );
	}
}