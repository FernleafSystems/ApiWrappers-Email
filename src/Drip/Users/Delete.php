<?php

namespace FernleafSystems\Apis\Email\Drip\Users;

use FernleafSystems\Apis\Email\Drip;

/**
 * Class Delete
 * @package FernleafSystems\Apis\Email\Drip\Users
 */
class Delete extends Drip\Api {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRawDataItem( 'email', $sEmail );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'subscribers/%', urlencode( $this->getStringParam( 'email' ) ) );
	}
}