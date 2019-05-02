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
	public function asVo() {
		$aAcs = [];

		try {
			$aRes = $this->send()
						 ->getDecodedResponseBody();

			if ( is_array( $aRes ) && !empty( $aRes[ 'accounts' ] ) ) {
				foreach ( $aRes[ 'accounts' ] as $aAc ) {
					$aAcs[] = $this->getVO()->applyFromArray( $aAc );
				}
			}
		}
		catch ( \Exception $oE ) {
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