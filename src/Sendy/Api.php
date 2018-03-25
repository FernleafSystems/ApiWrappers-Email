<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Sendy
 */
class Api extends BaseApi {

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
		return $aData;
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
}