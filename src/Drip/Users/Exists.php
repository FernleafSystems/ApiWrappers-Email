<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class Exists
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Exists {

	use ConnectionConsumer;

	/**
	 * @param string $sEmail
	 * @return bool
	 */
	public function byEmail( $sEmail ) {
		$oRtr = ( new Retrieve() )->setConnection( $this->getConnection() );
		return !empty( $oRtr->byEmail( $sEmail ) );
	}
}