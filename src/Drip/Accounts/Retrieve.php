<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class Retrieve extends Api {

	const REQUEST_METHOD = 'get';
	const IS_ACCOUNT_REQUEST = false;

	/**
	 * @param string $sId
	 * @return AccountVO|null
	 */
	public function byId( $sId ) {
		return $this->setId( $sId )
					->asVo();
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setId( $sId ) {
		return $this->setParam( 'id', $sId );
	}

	/**
	 * @return AccountVO|null
	 */
	public function asVo() {
		$aRes = $this->send()
					 ->getDecodedResponseBody();

		$oAc = null;
		if ( is_array( $aRes ) && !empty( $aRes[ 'accounts' ][ 0 ] ) ) {
			$oAc = ( new AccountVO() )->applyFromArray( $aRes[ 'accounts' ][ 0 ] );
		}
		return $oAc;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'accounts/%s', rawurlencode( $this->getParam( 'id' ) ) );
	}
}