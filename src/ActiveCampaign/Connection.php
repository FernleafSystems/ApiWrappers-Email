<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://%s.api-us1.com/api/%s';
	const API_VERSION = 3;

	/**
	 * @var string
	 */
	protected $sAccountUrl;

	/**
	 * @return string
	 */
	public function getAccountUrl() {
		return $this->sAccountUrl;
	}

	/**
	 * @return int
	 */
	public function getApiVersion() {
		return self::API_VERSION;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( self::API_URL, $this->getAccountUrl(), $this->getApiVersion() );
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return 'application/json';
	}

	/**
	 * @return bool
	 */
	public function hasAccountUrl() {
		return !empty( $this->sAccountUrl );
	}

	/**
	 * @param string $sApiKey
	 * @return $this
	 */
	public function setAccountUrl( $sApiKey ) {
		$this->sAccountUrl = $sApiKey;
		return $this;
	}
}
