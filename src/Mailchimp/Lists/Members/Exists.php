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
	 * @return bool
	 */
	public function exists( $sEmail ) {
		$oMember = ( new Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $sEmail );
		return !empty( $oMember );
	}
}
