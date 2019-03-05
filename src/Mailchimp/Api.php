<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp
 */
class Api extends BaseApi {

	/**
	 */
	protected function preFlight() {
		$this->setRequestHeader( 'Accept', $this->getRequestContentType() )
			 ->setRequestHeader( 'Content-Type', $this->getRequestContentType() )
			 ->setRequestHeader( 'Authorization', 'Basic '.base64_encode( 'anything:'.$this->getConnection()->api_key ) );
	}
}