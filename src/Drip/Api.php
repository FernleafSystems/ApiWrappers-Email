<?php

namespace FernleafSystems\Apis\Email\Drip;

use FernleafSystems\Apis\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\Apis\Email\Drip
 */
class Api extends BaseApi {

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
		return rtrim( $oCon->getBaseUrl(), '/' ) . '/';
	}
}