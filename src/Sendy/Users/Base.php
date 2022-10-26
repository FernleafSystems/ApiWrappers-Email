<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

use FernleafSystems\ApiWrappers\Email\Sendy\Api;

class Base extends Api {

	/**
	 * @param string $email
	 * @return $this
	 */
	public function setEmail( $email ) {
		return $this->setRequestDataItem( 'email', $email );
	}
}