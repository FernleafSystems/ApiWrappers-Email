<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

use FernleafSystems\ApiWrappers\Email\Sendy\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Sendy\Users
 */
class Base extends Api {

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setListId( $nId ) {
		return $this->setRequestDataItem( 'list_id', $nId );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}
}