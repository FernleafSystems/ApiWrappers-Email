<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip\Api;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class RetrieveAll extends Api {

	const REQUEST_METHOD = 'get';
	const IS_ACCOUNT_REQUEST = false;

	/**
	 * @return AccountVO[]|null
	 */
	public function asVo() {
		$aRes = $this->send()
					 ->getDecodedResponseBody();

		$aAcs = array();
		if ( is_array( $aRes ) && !empty( $aRes[ 'accounts' ] ) ) {
			foreach ( $aRes[ 'accounts' ] as $aAc ) {
				$aAcs[] = ( new AccountVO() )->applyFromArray( $aAc );
			}
		}

		return $aAcs;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'accounts';
	}
}