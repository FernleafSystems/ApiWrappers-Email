<?php

namespace FernleafSystems\Apis\Email\Drip\Users;

use FernleafSystems\Apis\Email\Drip;

class Create extends Drip\Api {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aFields
	 * @return $this
	 */
	public function setCustomFields( $aFields ) {
		return $this->setRequestDataItem( 'custom_fields', $aFields );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

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
		return 'subscribers';
	}
}