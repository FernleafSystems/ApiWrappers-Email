<?php

namespace FernleafSystems\Apis\Email\Mailchimp;

class Connection extends \FernleafSystems\Apis\Base\Connection {

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
		return 'application/vnd.api+json';
	}
}
