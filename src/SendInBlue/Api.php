<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue
 */
class Api extends BaseApi {

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getBaseUrl(), '/' ).'/';
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestHeader( 'api-key', $this->getConnection()->getApiKey() );
		return parent::prepFinalRequestData();
	}
}