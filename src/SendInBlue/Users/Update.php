<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

class Update extends Create {

	const REQUEST_METHOD = 'put';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		$this->email = $sEmail;
		return $this;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( 'contacts/%s', rawurlencode( $this->email ) );
	}
}