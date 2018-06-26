<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class Exists
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Exists {

	use ConnectionConsumer;

	/**
	 * @param string $sEmail
	 * @param string $sListId
	 * @return bool
	 */
	public function exists( $sEmail, $sListId ) {
		$oMember = ( new Retrieve() )
			->setConnection( $this->getConnection() )
			->setListId( $sListId )
			->byEmail( $sEmail );
		return !empty( $oMember );
	}
}
