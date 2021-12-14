<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

use FernleafSystems\ApiWrappers\Base\BaseApi;

class Api extends BaseApi {

	const ENDPOINT_KEY = '';
	const IS_ACCOUNT_REQUEST = true;

	/**
	 * @param int $nTimestamp
	 * @return string
	 */
	public static function convertToStdDateFormat( $nTimestamp ) {
		return date( 'c', $nTimestamp );
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$data = parent::prepFinalRequestData();
		$data[ 'auth' ] = [ $this->getConnection()->api_key, '' ];
		return $data;
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $conn */
		$conn = $this->getConnection();
		$url = static::IS_ACCOUNT_REQUEST ? $conn->getBaseUrlWithAccountId() : $conn->getBaseUrl();
		return rtrim( $url, '/' ).'/';
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