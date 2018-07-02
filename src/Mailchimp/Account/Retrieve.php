<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Account;

use FernleafSystems\ApiWrappers\Email\Mailchimp\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Account
 */
class Retrieve extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return AccountVO|null
	 */
	public function retrieve() {
		$oMember = null;
		try {
			$aRes = $this->send()
						 ->getDecodedResponseBody();
			if ( !empty( $aRes ) && is_array( $aRes ) && isset( $aRes[ 'account_id' ] ) ) {
				$oMember = ( new AccountVO() )->applyFromArray( $aRes );
			}
		}
		catch ( \Exception $oE ) {
		}
		return $oMember;
	}
}
