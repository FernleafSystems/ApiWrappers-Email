<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Batches;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class People_CreateUpdate
 * @package FernleafSystems\ApiWrappers\Email\Drip\Batches
 */
class People_CreateUpdate extends Base {

	/**
	 * @param Drip\People\PeopleVO $oPerson
	 * @return $this
	 */
	public function addPerson( Drip\People\PeopleVO $oPerson ) {
		return $this->addPersonData( $oPerson->getRawDataAsArray() );
	}

	/**
	 * @param array $aSubData
	 * @return $this
	 */
	public function addPersonData( $aSubData ) {
		$aSubs = $this->getRequestDataItem( 'subscribers' );
		if ( !is_array( $aSubs ) ) {
			$aSubs = [];
		}
		$aSubs[] = $aSubData;
		return $this->setRequestDataItem( 'subscribers', $aSubs );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', 'subscribers', parent::getUrlEndpoint() );
	}
}