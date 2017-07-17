<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Lists;

use FernleafSystems\Apis\Email\SendInBlue\Api;

class Retrieve extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sName
	 * @return ListVO|null
	 */
	public function byName( $sName ) {

		$aLists = ( new RetrieveAll() )
			->setConnection( $this->getConnection() )
			->retrieve();

		$oList = null;
		foreach ( $aLists as $oMaybe ) {
			if ( $oMaybe->getName() == $sName ) {
				$oList = $oMaybe;
			}
		}
		return $oList;
	}
}