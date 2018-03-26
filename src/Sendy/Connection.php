<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\Sendy
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	/**
	 * @var string
	 */
	protected $sUrl;

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return $this->sUrl;
	}

	/**
	 * @return bool
	 */
	public function hasBaseUrl() {
		return !empty( $this->sUrl );
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setBaseUrl( $sUrl ) {
		$this->sUrl = $sUrl;
		return $this;
	}
}
