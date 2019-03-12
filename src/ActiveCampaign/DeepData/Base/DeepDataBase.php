<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Base;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class DeepDataBase extends ActiveCampaign\Api {

	const ENDPOINT_KEY = '';

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return static::ENDPOINT_KEY.'s';
	}
}