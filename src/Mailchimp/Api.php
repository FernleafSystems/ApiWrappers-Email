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
			 ->setRequestHeader( 'Authorization', 'Basic '.base64_encode( 'anything:'.$oCon->api_key ) );

		return parent::prepFinalRequestData();
	}
}