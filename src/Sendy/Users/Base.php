<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

use FernleafSystems\ApiWrappers\Email\Sendy\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Users
 */
class Base extends Api {

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}
}