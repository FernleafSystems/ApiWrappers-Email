<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Account;

use FernleafSystems\ApiWrappers\Email\Mailchimp;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Account
 */
class Retrieve extends Mailchimp\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return AccountVO|null
	 */
	public function retrieve() {
		$oMember = null;
		$aRes = $this->req()->getDecodedResponseBody();
		if ( is_array( $aRes ) && isset( $aRes[ 'account_id' ] ) ) {
			$oMember = ( new AccountVO() )->applyFromArray( $aRes );
		}
		return $oMember;
	}
}
