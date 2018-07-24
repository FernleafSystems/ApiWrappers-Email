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
		$sOriginalFirst = $oContact->getAttribute( $sFKey );
		$sOriginalLast = $oContact->getAttribute( $sLKey );

		list( $sNewFirst, $sNewLast ) = ( new Common\Data\CleanNames() )
			->names( $sOriginalFirst, $sOriginalLast );

		// No unnecessary updates and so no unnecessary webhook firing on profile updates
		if ( $sOriginalFirst != $sNewFirst || $sOriginalLast != $sNewLast ) {
			( new Users\Update() )
				->setConnection( $this->getConnection() )
				->setAttributes(
					[
						$sFKey => $sNewFirst,
						$sLKey => $sNewLast,
					]
				)
				->setEmail( $oContact->getEmail() )
				->req();
		}

		return ( new Users\Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $oContact->getEmail() );
	}
}