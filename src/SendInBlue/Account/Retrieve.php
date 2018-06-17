<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Account;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Account
 */
class Retrieve extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return AccountVO|null
	 */
	public function req() {
		return $this->asVo();
	}

	/**
	 * ref: https://apidocs.sendinblue.com/account/#7
	 * @return AccountVO|null
	 */
	protected function asVo() {
		$oAc = null;

		try {
			$aRes = $this->send()
						 ->getDecodedResponseBody();
			if ( is_array( $aRes ) && !empty( $aRes[ 'data' ] ) ) {
				foreach ( $aRes[ 'data' ] as $aData ) {
					if ( isset( $aData[ 'client_id' ] ) ) {
						$oAc = ( new AccountVO() )->applyFromArray( $aData );
						break;
					}
				}
			}
		}
		catch ( \Exception $oE ) {
		}

		return $oAc;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'account';
	}
}