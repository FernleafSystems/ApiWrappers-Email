<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
class Base extends GetResponse\Api {

	/**
	 * It's rare to override this Final data request, but when creating subscribers the data for
	 * the new subscriber needs to be wrapped up in an array.
	 * @return array
	 */
	public function getRequestDataFinal() {
		return array( 'subscribers' => array( $this->getRequestData() ) );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'contacts';
	}
}