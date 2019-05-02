<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Retrieve extends Delete {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return PeopleVO|null
	 */
	public function byEmail( $sEmail ) {
		return $this->setEmail( $sEmail )
					->removeRequestDataItem( 'id' )
					->asVo();
	}

	/**
	 * @return PeopleVO|null
	 */
	public function asVo() {
		$oMember = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aRes = $this->getDecodedResponseBody();
			if ( is_array( $aRes ) && !empty( $aRes[ 'subscribers' ][ 0 ] ) ) {
				$oMember = $this->getVO()->applyFromArray( $aRes[ 'subscribers' ][ 0 ] );
			}
		}
		return $oMember;
	}
}