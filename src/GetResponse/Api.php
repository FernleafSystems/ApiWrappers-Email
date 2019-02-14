<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\GetResponse
 */
class Api extends \FernleafSystems\ApiWrappers\Base\BaseApi {

	/**
	 * @return $this
	 */
	public function req() {
		try {
			$this->send();
		}
		catch ( \Exception $oE ) {
		}
		return $this;
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestHeader( 'X-Auth-Token', sprintf( 'api-key %s', $this->getConnection()->getApiKey() ) );
		return parent::prepFinalRequestData();
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getBaseUrl(), '/' ).'/';
	}
}