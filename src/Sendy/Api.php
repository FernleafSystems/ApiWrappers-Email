<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Sendy
 */
class Api extends BaseApi {

	const LIST_ID_KEY = 'list_id';

	/**
	 * @return array
	 */
	protected function getFinaRequest() {
		$aData = parent::prepFinalRequestData();
		$aData[ 'api_key' ] = $this->getConnection()->getApiKey();
		return $aData;
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		$aData = parent::getRequestDataFinal();
		$aData[ 'api_key' ] = $this->getConnection()->getApiKey();
		var_dump( $aData );
		return $aData;
	}

	/**
	 * @return array
	 */
	public function getRequestHeaders() {
		return $this->getArrayParam(
			'request_headers',
			array()
		);
	}

	/**
	 * @return string
	 */
	public function getDataChannel() {
		return 'form_params';
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return $oCon->getBaseUrl();
	}

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setListId( $nId ) {
		return $this->setRequestDataItem( static::LIST_ID_KEY, $nId );
	}
}