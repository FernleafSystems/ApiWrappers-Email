<?php

namespace FernleafSystems\ApiWrappers\Email\ElasticEmail;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\ElasticEmail
 */
class Api extends BaseApi {

	const REQUEST_METHOD = 'get';

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		$aData = parent::getRequestDataFinal();
		$aData[ 'apikey' ] = $this->getConnection()->getApiKey();
		return $aData;
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