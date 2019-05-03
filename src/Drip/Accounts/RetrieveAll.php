<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class RetrieveAll extends Base {

	const REQUEST_METHOD = 'get';
	const IS_ACCOUNT_REQUEST = false;

	/**
	 * @return AccountVO[]
	 */
	public function asVOs() {
		$aAcs = [];
		if ( $this->req()->isLastRequestSuccess() ) {
			$aRes = $this->getDecodedResponseBody();
			if ( !empty( $aRes[ static::ENDPOINT_KEY ] ) && is_array( $aRes ) ) {
				foreach ( $aRes[ static::ENDPOINT_KEY ] as $aAc ) {
					$aAcs[] = $this->getVO()->applyFromArray( $aAc );
				}
			}
		}
		return $aAcs;
	}
}