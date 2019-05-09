<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\GetResponse
 */
class Api extends \FernleafSystems\ApiWrappers\Base\BaseApi {

	/**
	 */
	protected function preFlight() {
		$this->setRequestHeader( 'X-Auth-Token', sprintf( 'api-key %s', $this->getConnection()->api_key ) );
	}
}