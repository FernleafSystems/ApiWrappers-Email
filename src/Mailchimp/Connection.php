<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp;

class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return 'https://%s.api.mailchimp.com/3.0/';
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return 'application/json';
	}
}
