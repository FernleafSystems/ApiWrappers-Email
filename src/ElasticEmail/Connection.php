<?php

namespace FernleafSystems\ApiWrappers\Email\ElasticEmail;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\ElasticEmail
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.elasticemail.com/v%s';
	const API_VERSION = '2';

	/**
	 * @return string
	 * @deprecated
	 */
	public function getVersion() {
		return $this->getApiVersion();
	}
}
