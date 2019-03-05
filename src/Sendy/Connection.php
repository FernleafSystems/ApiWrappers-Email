<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\Sendy
 * @property string $installation_url
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return $this->installation_url;
	}

	/**
	 * @return bool
	 */
	public function hasBaseUrl() {
		return !empty( $this->installation_url );
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setBaseUrl( $sUrl ) {
		$this->installation_url = $sUrl;
		return $this;
	}
}
