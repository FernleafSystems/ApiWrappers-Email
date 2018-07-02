<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Ping;

use FernleafSystems\ApiWrappers\Email\Mailchimp\Api;

/**
 * Class Ping
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Ping
 */
class Ping extends Api {

	const REQUEST_METHOD = 'get';

	public function run() {
		$aRes = $this->send()
					 ->getDecodedResponseBody();
		return !empty( $aRes ) && is_array( $aRes ) && isset( $aRes[ 'health_status' ] );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'ping' );
	}
}