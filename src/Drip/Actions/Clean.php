<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Actions;

use FernleafSystems\ApiWrappers\Email\Common;
use FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class CleanNames
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Actions
 */
class Clean extends Common\Actions\Clean {

	const DEFAULT_FIRST_NAME_KEY = 'first_name';
	const DEFAULT_LAST_NAME_KEY = 'last_name';

	/**
	 * @param Users\PeopleVO $oContact
	 * @return Users\PeopleVO
	 */
	public function names( $oContact ) {
		$sFKey = $this->getFirstNameKey();
		$sLKey = $this->getLastNameKey();
		$sOriginalFirst = $oContact->getCustomField( $sFKey );
		$sOriginalLast = $oContact->getCustomField( $sLKey );

		list( $sNewFirst, $sNewLast ) = ( new Common\Data\CleanNames() )
			->names( $sOriginalFirst, $sOriginalLast );

		// No unnecessary updates and so no unnecessary webhook firing on profile updates
		if ( $sOriginalFirst != $sNewFirst || $sOriginalLast != $sNewLast ) {
			( new Users\Update() )
				->setConnection( $this->getConnection() )
				->setCustomField( $sFKey, $sNewFirst )
				->setCustomField( $sLKey, $sNewLast )
				->setEmail( $oContact->email )
				->req();
		}

		return ( new Users\Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $oContact->email );
	}
}