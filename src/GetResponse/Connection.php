<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\GetResponse
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.getresponse.com';
	const API_VERSION = 3;

	/**
	 * @var string
	 */
	protected $sAccountId;

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( '%s/v%s', self::API_URL, self::API_VERSION );
	}

	/**
	 * @return bool
	 */
	public function hasAccountId() {
		return !empty( $this->sAccountId );
	}

	/**
	 * @param string $sApiKey
	 * @return $this
	 */
	public function setAccountId( $sApiKey ) {
		$this->sAccountId = $sApiKey;
		return $this;
	}
}
