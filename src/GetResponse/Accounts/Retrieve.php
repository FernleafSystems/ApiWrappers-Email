<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Accounts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Accounts
 */
class Retrieve extends \FernleafSystems\ApiWrappers\Email\GetResponse\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return AccountVO|null
	 */
	public function asVo() {
		$oVo = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oVo = ( new AccountVO() )->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oVo;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'accounts' );
	}
}