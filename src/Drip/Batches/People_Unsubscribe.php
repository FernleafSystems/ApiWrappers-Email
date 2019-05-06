<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Batches;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class People_Unsubscribe extends Base {

	/**
	 * @param Drip\Users\PeopleVO $oPerson
	 * @return $this
	 */
	public function addPerson( Drip\Users\PeopleVO $oPerson ) {
		return $this->addEmail( $oPerson->email );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function addEmail( $sEmail ) {
		$aSubs = $this->getRequestDataItem( 'subscribers' );
		if ( !is_array( $aSubs ) ) {
			$aSubs = [];
		}
		$aSubs[] = [ 'email' => $sEmail ];
		return $this->setRequestDataItem( 'subscribers', $aSubs );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', 'unsubscribes', parent::getUrlEndpoint() );
	}
}