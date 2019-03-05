<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Retrieve extends Delete {

	const REQUEST_METHOD = 'get';

	/**
	 * @return MemberVO|null
	 */
	public function req() {
		try {
			$oUser = $this->asVo();
		}
		catch ( \Exception $oE ) {
			$oUser = null;
		}
		return $oUser;
	}

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		return $this->setEmail( $sEmail )
					->removeRequestDataItem( 'id' )
					->req();
	}

	/**
	 * @return MemberVO|null
	 * @throws \Exception
	 */
	public function asVo() {
		$aResult = $this->send()
						->getDecodedResponseBody();
		$oMember = null;
		if ( is_array( $aResult ) && !empty( $aResult[ 'subscribers' ][ 0 ] ) ) {
			$oMember = ( new MemberVO() )->applyFromArray( $aResult[ 'subscribers' ][ 0 ] );
		}
		return $oMember;
	}
}