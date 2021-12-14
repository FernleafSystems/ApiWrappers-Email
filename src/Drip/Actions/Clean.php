<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Actions;

use FernleafSystems\ApiWrappers\Email\Common;
use FernleafSystems\ApiWrappers\Email\Drip\People;

class Clean extends Common\Actions\Clean {

	const DEFAULT_FIRST_NAME_KEY = 'first_name';
	const DEFAULT_LAST_NAME_KEY = 'last_name';

	/**
	 * @param People\PeopleVO $oContact
	 * @return People\PeopleVO
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
			( new People\Update() )
				->setConnection( $this->getConnection() )
				->setCustomField( $sFKey, $sNewFirst )
				->setCustomField( $sLKey, $sNewLast )
				->setEmail( $oContact->email )
				->req();
		}

		return ( new People\Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $oContact->email );
	}
}