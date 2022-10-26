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

	protected function prepFinalRequestData() :array {
		$data = parent::prepFinalRequestData();
		$data[ 'auth' ] = [ $this->getConnection()->api_key, '' ];
		return $data;
	}

	protected function getBaseUrl() :string {
		/** @var Connection $conn */
		$conn = $this->getConnection();
		$url = static::IS_ACCOUNT_REQUEST ? $conn->getBaseUrlWithAccountId() : $conn->getBaseUrl();
		return rtrim( $url, '/' ).'/';
	}

	/**
	 * It's rare to override this Final data request, but when creating subscribers, for example, the data for
	 * the new subscriber needs to be wrapped up in an array.
	 */
	public function getRequestDataFinal() :array {
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