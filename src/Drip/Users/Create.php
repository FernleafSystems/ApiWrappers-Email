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
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}