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
		$this->email = $sEmail;
		return $this;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return sprintf( 'contacts/%s', rawurlencode( $this->email ) );
	}
}