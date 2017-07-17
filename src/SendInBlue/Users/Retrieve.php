<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

class Retrieve extends Delete {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		$aResult = $this->setEmail( $sEmail )
						->send()
						->getDecodedResponseBody();
		$oMember = null;
		if ( is_array( $aResult ) && !empty( $aResult[ 'data' ] ) ) {
			$oMember = ( new MemberVO() )->applyFromArray( $aResult[ 'data' ] );
		}
		return $oMember;
	}
}