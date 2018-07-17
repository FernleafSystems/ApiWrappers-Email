<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

class Retrieve extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return ListVO|null
	 */
	public function req() {
		$oVo = null;
		try {
			$this->send();
			$aData = $this->getDecodedResponseBody();
			if ( !empty( $aData ) ) {
				$oVo = ( new ListVO() )->applyFromArray( $aData );
			}
		}
		catch ( \Exception $oE ) {
		}
		return $oVo;
	}

	/**
	 * @param string $sId
	 * @return ListVO|null
	 */
	public function byId( $sId ) {
		return $this->setParam( 'list_id', $sId )
					->req();
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

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'contacts/lists/%s', $this->getParam( 'list_id' ) );
	}
}