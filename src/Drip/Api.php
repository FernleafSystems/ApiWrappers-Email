<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Drip
 */
class Api extends BaseApi {

	const IS_ACCOUNT_REQUEST = true;

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
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$this->setRequestHeader( 'Accept', $oCon->getContentType() )
			 ->setRequestHeader( 'Content-Type', $oCon->getContentType() );
		$aFinal = parent::prepFinalRequestData();
		$aFinal[ 'auth' ] = array( $oCon->getApiKey(), '' );
		return $aFinal;
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getBaseUrl( $this->isAccountRequest() ), '/' ).'/';
	}

	/**
	 * @return bool
	 */
	protected function isAccountRequest() {
		return static::IS_ACCOUNT_REQUEST;
	}
}