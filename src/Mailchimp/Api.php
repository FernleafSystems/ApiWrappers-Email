<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp
 */
class Api extends BaseApi {

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$this->setRequestHeader( 'Accept', $oCon->getContentType() )
			 ->setRequestHeader( 'Content-Type', $oCon->getContentType() )
			 ->setRequestHeader( 'Authorization', 'apikey ' . $oCon->getApiKey() );

		return parent::prepFinalRequestData();
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$sBase = sprintf( $oCon->getBaseUrl(), explode( '-', $oCon->getApiKey() )[ 1 ] );
		return rtrim( $sBase, '/' ) . '/';
	}
}