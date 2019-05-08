<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

/**
 * Class Exists
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
class Exists extends Base {

	/**
	 * @param string $sEmail
	 * @return bool
	 */
	public function byEmail( $sEmail ) {
		$oRtr = ( new Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $sEmail );
		return ( $oRtr instanceof PeopleVO );
	}
}