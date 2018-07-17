<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue;

class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return 'https://api.sendinblue.com/v3/';
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return 'application/json';
	}
}
