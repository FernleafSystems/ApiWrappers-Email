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
		$oMember = null;

		$aResult = $this->send()
						->getDecodedResponseBody();
		if ( !empty( $aResult ) && is_array( $aResult ) ) {
			$oMember = ( new MemberVO() )->applyFromArray( $aResult );
		}
		return $oMember;
	}
}