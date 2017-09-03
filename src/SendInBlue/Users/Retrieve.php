<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 */
class Retrieve extends Delete {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		return $this->setEmail( $sEmail )
					->asVo();
	}

	/**
	 * @return MemberVO|null
	 */
	public function asVo() {
		$aResult = $this->send()
						->getDecodedResponseBody();
		$oMember = null;
		if ( is_array( $aResult ) && !empty( $aResult[ 'data' ] ) ) {
			$oMember = ( new MemberVO() )->applyFromArray( $aResult[ 'data' ] );
		}
		return $oMember;
	}
}