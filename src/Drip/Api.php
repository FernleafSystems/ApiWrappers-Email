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
	 * @return array
	 */
	protected function prepFinalRequestData() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$this->setRequestHeader( 'Accept', $oCon->getContentType() )
			 ->setRequestHeader( 'Content-Type', $oCon->getContentType() );
		$aFinal = parent::prepFinalRequestData();
		$aFinal[ 'auth' ] = array( $oCon->api_key, '' );
		return $aFinal;
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$sUrl = static::IS_ACCOUNT_REQUEST ? $oCon->getBaseUrlWithAccountId() : $oCon->getBaseUrl();
		return rtrim( $sUrl, '/' ).'/';
	}

	/**
	 * @param int $nTimestamp
	 * @return string
	 */
	static public function convertToStandardDateFormat( $nTimestamp ) {
		return date( 'c', $nTimestamp );
	}
}