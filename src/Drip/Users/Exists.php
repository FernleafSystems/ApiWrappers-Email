<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class Exists
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Exists extends Retrieve {

	/**
	 * @return bool
	 */
	public function req() {
		return !empty( parent::req() );
	}

	/**
	 * @param string $sEmail
	 * @return bool
	 */
	public function byEmail( $sEmail ) {
		return !empty( parent::byEmail( $sEmail ) );
	}
}