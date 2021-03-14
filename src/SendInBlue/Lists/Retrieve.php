<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Lists
 * @property string $list_id
 */
class Retrieve extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sId
	 * @return ListVO|null
	 */
	public function byId( $sId ) {
		$this->list_id = $sId;
		return $this->asVo();
	}

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

	protected function getUrlEndpoint() :string {
		return sprintf( 'contacts/lists/%s', $this->list_id );
	}
}