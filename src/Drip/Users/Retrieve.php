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
					->asVo();
	}

	/**
	 * @return PeopleVO|null
	 */
	public function asVo() {
		$oMember = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aRes = $this->getDecodedResponseBody();
			if ( is_array( $aRes ) && !empty( $aRes[ static::ENDPOINT_KEY ][ 0 ] ) ) {
				$oMember = $this->getVO()->applyFromArray( $aRes[ static::ENDPOINT_KEY ][ 0 ] );
			}
		}
		return $oMember;
	}
}