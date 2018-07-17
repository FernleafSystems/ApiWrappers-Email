<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class Exists
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes
 */
class Exists {

	use ConnectionConsumer;

	/**
	 * @param string $sName
	 * @return bool
	 */
	public function exists( $sName ) {
		$oRtr = ( new Retrieve() )->setConnection( $this->getConnection() );
		return !empty( $oRtr->byName( $sName ) );
	}
}