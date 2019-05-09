<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign
 */
class Api extends \FernleafSystems\ApiWrappers\Base\BaseApi {

	const ENDPOINT_KEY = '';

	/**
	 * @return BaseVO|mixed
	 */
	protected function getVO() {
		return new BaseVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return static::ENDPOINT_KEY.'s';
	}

	/**
	 */
	protected function preFlight() {
		$this->setRequestHeader( 'Api-Token', $this->getConnection()->api_key );
	}
}