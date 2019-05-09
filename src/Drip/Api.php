<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Drip
 */
class Api extends BaseApi {

	const ENDPOINT_KEY = '';
	const IS_ACCOUNT_REQUEST = true;

	/**
	 * @param int $nTimestamp
	 * @return string
	 */
	static public function convertToStdDateFormat( $nTimestamp ) {
		return date( 'c', $nTimestamp );
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$aFinal = parent::prepFinalRequestData();
		$aFinal[ 'auth' ] = [ $this->getConnection()->api_key, '' ];
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
	 * It's rare to override this Final data request, but when creating subscribers, for example, the data for
	 * the new subscriber needs to be wrapped up in an array.
	 * @return array
	 */
	public function getRequestDataFinal() {
		$aPayload = $this->getRequestData();
		$sPayloadKey = $this->getRequestPayloadDataKey();
		if ( !empty( $sPayloadKey ) ) {
			$aPayload = [ $sPayloadKey => [ $aPayload ] ];
		}
		return $aPayload;
	}

	/**
	 * @return string
	 */
	protected function getRequestPayloadDataKey() {
		return '';
	}
}