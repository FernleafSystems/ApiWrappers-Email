<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy\Users;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;

class Subscribe extends Unsubscribe {

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setRequestDataItem( 'fname', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		return $this->setRequestDataItem( 'lname', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setName( $sName ) {
		$aParts = ( new CleanNames() )->name( $sName );
		return $this->setRequestDataItem( 'name', implode( ' ', $aParts ) )
					->setFirstName( $aParts[ 0 ] )
					->setLastName( $aParts[ 1 ] );
	}

	protected function getUrlEndpoint() :string {
		return 'subscribe';
	}
}