<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign
 */
class Api extends \FernleafSystems\ApiWrappers\Base\BaseApi {

	const ENDPOINT_KEY = '';

	protected function getVO() :BaseVO {
		return new BaseVO();
	}

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY.'s';
	}

	protected function preFlight() {
		$this->setRequestHeader( 'Api-Token', $this->getConnection()->api_key );
	}
}