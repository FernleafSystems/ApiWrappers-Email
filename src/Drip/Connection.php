<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\Drip
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.getdrip.com/v%s';
	const API_VERSION = 2;

	/**
	 * @return string
	 */
	public function getBaseUrlWithAccountId() {
		return parent::getBaseUrl().'/'.$this->account_id;
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return 'application/json';
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
	 * @return bool
	 * @deprecated
	 */
	public function hasAccountId() {
		return !empty( $this->account_id );
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getAccountId() {
		return $this->account_id;
	}
}
