<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

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