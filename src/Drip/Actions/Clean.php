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
	 * @param Users\MemberVO $oContact
	 * @return Users\MemberVO
	 */
	public function names( $oContact ) {
		$sFKey = $this->getFirstNameKey();
		$sLKey = $this->getLastNameKey();
		list( $sFirst, $sLast ) = ( new Common\Data\CleanNames() )
			->names( $oContact->getCustomField( $sFKey ), $oContact->getCustomField( $sLKey ) );

		( new Users\Update() )
			->setConnection( $this->getConnection() )
			->setCustomField( $sFKey, $sFirst )
			->setCustomField( $sLKey, $sLast )
			->setEmail( $oContact->getEmail() )
			->req();

		return ( new Users\Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $oContact->getEmail() );
	}
}