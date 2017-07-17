<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

use FernleafSystems\Apis\Email\SendInBlue\Api;

/**
 * SendInBlue doesn't permit changing of an email address so we must duplicate the old and then unsubscribe it.
 *
 * Class UpdateEmail
 * @package FernleafSystems\Apis\Email\SendInBlue\Users
 */
class UpdateEmail extends Api {

	/**
	 * @return bool
	 */
	public function update() {

		$oUser = ( new Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $this->getOriginalEmail() );
		if ( empty( $oUser ) ) {
			return false;
		}

		$aAttributes = $oUser->getAttributes();
		$sNotes = isset( $aAttributes[ 'NOTES' ] ) ? $aAttributes[ 'NOTES' ] : '';
		$aAttributes[ 'NOTES' ] = $sNotes.' ||'.sprintf( 'Previous Email Address was %s.', $this->getOriginalEmail() );

		( new SubscribeToLists() )
			->setConnection( $this->getConnection() )
			->setEmail( $this->getNewEmail() )
			->setAttributes( $aAttributes );
		( new Delete() )
			->setConnection( $this->getConnection() )
			->setEmail( $this->getOriginalEmail() )
			->send();
	}

	/**
	 * @return string
	 */
	public function getOriginalEmail() {
		return $this->getParam( 'original_email' );
	}

	/**
	 * @return string
	 */
	public function getNewEmail() {
		return $this->getParam( 'new_email' );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setOriginalEmail( $sEmail ) {
		return $this->setParam( 'original_email', $sEmail );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setNewEmail( $sEmail ) {
		return $this->setParam( 'new_email', $sEmail );
	}
}