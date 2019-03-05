<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp;

class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://%s.api.mailchimp.com/%s/';
	const API_VERSION = '3.0';

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( static::API_URL, explode( '-', $this->api_key )[ 1 ], static::API_VERSION );
	}
}
