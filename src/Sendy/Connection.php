<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

/**
 * @property string $installation_url
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	public function getBaseUrl() :string {
		return $this->installation_url;
	}

	public function hasBaseUrl() :bool {
		return !empty( $this->installation_url );
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setBaseUrl( $url ) {
		$this->installation_url = $url;
		return $this;
	}
}
