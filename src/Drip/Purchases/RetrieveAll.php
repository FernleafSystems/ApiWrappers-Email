<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Purchases;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Purchases
 */
class RetrieveAll extends Base {

	/**
	 * @return array
	 * @throws \Exception
	 */
	public function retrieve() {
		$aResults = $this->send()
						 ->getDecodedResponseBody();

		return isset( $aResults[ 'purchases' ] ) ? $aResults[ 'purchases' ] : array();
	}
}