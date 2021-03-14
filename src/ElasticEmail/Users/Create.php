<?php

namespace FernleafSystems\ApiWrappers\Email\ElasticEmail\Users;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;
use FernleafSystems\ApiWrappers\Email\ElasticEmail\Api;

class Create extends Api {

	/**
	 * @param int $nTimestamp
	 * @return $this
	 */
	public function setDateOfConsent( $nTimestamp ) {
		return $this->setRequestDataItem( 'consentDate', gmdate( 'd/m/Y', $nTimestamp ).' 0:00:01 AM' );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setRequestDataItem( 'firstName', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		return $this->setRequestDataItem( 'lastName', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setName( $sName ) {
		$aParts = ( new CleanNames() )->name( $sName );
		return $this->setFirstName( $aParts[ 0 ] )
					->setLastName( $aParts[ 1 ] );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'emails', $sEmail );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return 'contact/quickadd';
	}
}