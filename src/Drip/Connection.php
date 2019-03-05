<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\Drip
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.getdrip.com/v%s/%s';
	const API_VERSION = 2;

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( static::API_URL, static::API_VERSION, '' );
	}

	/**
	 * @return string
	 */
	public function getBaseUrlWithAccountId() {
		return sprintf( static::API_URL, static::API_VERSION, $this->account_id );
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return 'application/vnd.api+json';
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setAccountId( $sId ) {
		$this->account_id = $sId;
		return $this;
	}

	/**
	 * @deprecated
	 * @return bool
	 */
	public function hasAccountId() {
		return !empty( $this->account_id );
	}

	/**
	 * @deprecated
	 * @return string
	 */
	public function getAccountId() {
		return $this->account_id;
	}
}
