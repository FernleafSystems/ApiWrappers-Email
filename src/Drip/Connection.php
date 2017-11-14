<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\Drip
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const DRIP_API_VERSION = 2;

	/**
	 * @var string
	 */
	protected $sAccountId;

	/**
	 * @return string
	 */
	public function getAccountId() {
		return $this->sAccountId;
	}

	/**
	 * @return int
	 */
	public function getApiVersion() {
		return self::DRIP_API_VERSION;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( 'https://api.getdrip.com/v%s/%s', $this->getApiVersion(), $this->getAccountId() );
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return 'application/vnd.api+json';
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
