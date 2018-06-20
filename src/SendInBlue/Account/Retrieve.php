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
	 * ref: https://developers.sendinblue.com/v3.0/reference#getaccount-6
	 * @return AccountVO|null
	 */
	protected function asVo() {
		$oAc = null;

		try {
			$aRes = $this->send()
						 ->getDecodedResponseBody();
			if ( is_array( $aRes ) ) {
				$oAc = ( new AccountVO() )->applyFromArray( $aRes );
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