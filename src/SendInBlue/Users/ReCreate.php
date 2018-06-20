<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class ReCreate
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\User
 */
class ReCreate {

	use ConnectionConsumer;

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		$oConn = $this->getConnection();

		$bExists = ( new Exists() )
			->setConnection( $oConn )
			->byEmail( $sEmail );

		$aAttrs = array();
		$aActiveLists = array();

		if ( $bExists ) {
			$oSub = ( new Retrieve() )
				->setConnection( $oConn )
				->byEmail( $sEmail );

			$aAttrs = $oSub->getAttributes();
			$aActiveLists = $oSub->getActiveListIds();

			( new Delete() )
				->setConnection( $oConn )
				->setEmail( $sEmail )
				->req();
		}

		( new Create() )
			->setConnection( $oConn )
			->setEmail( $sEmail )
			->setAttributes( $aAttrs )
			->req();

		if ( !empty( $aActiveLists ) ) {
			( new SubscribeToLists() )
				->setConnection( $oConn )
				->setEmail( $sEmail )
				->setLists( $aActiveLists )
				->req();
		}

		return ( new Retrieve() )
			->setConnection( $oConn )
			->byEmail( $sEmail );
	}
}