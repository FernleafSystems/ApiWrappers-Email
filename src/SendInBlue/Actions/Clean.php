<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Actions;

use FernleafSystems\ApiWrappers\Email\Common;
use FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

/**
 * Class CleanNames
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Actions
 */
class Clean extends Common\Actions\Clean {

	const DEFAULT_FIRST_NAME_KEY = 'NAME';
	const DEFAULT_LAST_NAME_KEY = 'SURNAME';

	/**
	 * @param Users\MemberVO $oContact
	 * @return Users\MemberVO
	 */
	public function names( $oContact ) {
		$sFKey = $this->getFirstNameKey();
		$sLKey = $this->getLastNameKey();
		list( $sFirst, $sLast ) = ( new Common\Data\CleanNames() )
			->names( $oContact->getAttribute( $sFKey ), $oContact->getAttribute( $sLKey ) );

		( new Users\Update() )
			->setConnection( $this->getConnection() )
			->setAttributes(
				[
					$sFKey => $sFirst,
					$sLKey => $sLast,
				]
			)
			->setEmail( $oContact->getEmail() )
			->req();

		return ( new Users\Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $oContact->getEmail() );
	}
}