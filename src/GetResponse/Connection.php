<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\GetResponse
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.getresponse.com/v%s';
	const API_VERSION = 3;

	/**
	 * @return bool
	 * @deprecated
	 */
	public function hasAccountId() {
		return !empty( $this->account_id );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setAccountId( $sId ) {
		$this->account_id = $sId;
		return $this;
	}
}
