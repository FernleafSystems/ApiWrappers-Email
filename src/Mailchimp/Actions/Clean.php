<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Actions;

use FernleafSystems\ApiWrappers\Email\Common;
use FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

/**
 * Class CleanNames
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Actions
 */
class Clean extends Common\Actions\Clean {

	const DEFAULT_FIRST_NAME_KEY = 'FNAME';
	const DEFAULT_LAST_NAME_KEY = 'LNAME';

	/**
	 * @param Members\MemberVO $oContact
	 * @return Members\MemberVO|null
	 */
	public function names( $oContact ) {
		$sFKey = $this->getFirstNameKey();
		$sLKey = $this->getLastNameKey();
		list( $sFirst, $sLast ) = ( new Common\Data\CleanNames() )
			->names( $oContact->getMergeField( $sFKey ), $oContact->getMergeField( $sLKey ) );

		( new Members\Update() )
			->setConnection( $this->getConnection() )
			->setListId( $oContact->getListId() )
			->setMergeFields(
				[
					$sFKey => $sFirst,
					$sLKey => $sLast,
				]
			)
			->byEmail( $oContact->getEmail() );

		return ( new Members\Retrieve() )
			->setConnection( $this->getConnection() )
			->setListId( $oContact->getListId() )
			->byEmail( $oContact->getEmail() );
	}
}