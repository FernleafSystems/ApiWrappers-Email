<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

/**
 * Trait Updater
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
trait Updater {

	/**
	 * @var ContactOnListVO
	 */
	private $oCurrentContact;

	/**
	 * @return ContactOnListVO|null
	 */
	public function update() {
		$oVo = null;
		$this->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = ( new Retrieve() )
				->setConnection( $this->getConnection() )
				->byId( $this->getParam( 'id' ) );
		}
		return $oVo;
	}

	/**
	 * @param string $sId - the GR ID of the contact to update
	 * @return $this
	 */
	public function setContactId( $sId ) {
		return $this->setParam( 'id', $sId );
	}

	/**
	 * @param ContactOnListVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		$this->oCurrentContact = $oContact;
		return $this->setContactId( $oContact->contactId );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( empty( $this->getParam( 'id' ) ) ) {
			throw new \Exception( 'Contact ID must be specified' );
		}
	}

	/**
	 * @return ContactOnListVO
	 * @throws \Exception
	 */
	protected function getCurrentContact() {
		if ( empty( $this->oCurrentContact ) ) {
			if ( empty( $this->getParam( 'id' ) ) ) {
				throw new \Exception( "Can't access existing contact without ID" );
			}
			$this->oCurrentContact = ( new Retrieve() )
				->setConnection( $this->getConnection() )
				->byId( $this->getParam( 'id' ) );
		}
		return $this->oCurrentContact;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'contacts/'.$this->getParam( 'id' );
	}
}