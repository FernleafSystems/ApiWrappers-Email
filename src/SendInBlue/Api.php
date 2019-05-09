<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue
 */
class Api extends BaseApi {

	/**
	 */
	protected function preFlight() {
		$this->setRequestHeader( 'api-key', $this->getConnection()->api_key );
	}
}