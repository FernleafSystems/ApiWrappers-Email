<?php

namespace FernleafSystems\ApiWrappers\Email\ElasticEmail;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\ElasticEmail
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const BASE_URL = 'https://api.elasticemail.com';

	/**
	 * @var string
	 */
	protected $sVersion;

	/**
	 * @return string
	 */
	public function getVersion() {
		return empty( $this->sVersion ) ? '2' : $this->sVersion;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( self::BASE_URL.'/v%s/', $this->getVersion() );
	}

	/**
	 * @param string $sVersion
	 * @return $this
	 */
	public function setVersion( $sVersion ) {
		$this->sVersion = $sVersion;
		return $this;
	}
}
