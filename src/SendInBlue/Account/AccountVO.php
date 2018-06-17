<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Account;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Account
 */
class AccountVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}
}