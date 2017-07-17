<?php

namespace FernleafSystems\Apis\Email\Mailchimp;

use FernleafSystems\Apis\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\Apis\Email\Mailchimp
 */
class Api extends BaseApi {

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestHeader( 'Accept', Constants::Content_Type )
			 ->setRequestHeader( 'Content-Type', Constants::Content_Type )
			 ->setRequestHeader( 'Authorization', 'apikey ' . $this->getConnection()->getApiKey() );

		return parent::prepFinalRequestData();
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		$sBase = sprintf( Constants::Url_Base, explode( '-', $this->getConnection()->getApiKey() )[ 1 ] );
		return rtrim( $sBase, '/' ) . '/';
	}
}