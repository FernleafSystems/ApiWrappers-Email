<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class Base extends ActiveCampaign\Api {

	/**
	 * @return ConnectionVO|null
	 */
	public function asVo() {
		return parent::asVo();
	}

	/**
	 * @return ConnectionVO
	 */
	protected function getVO() {
		return new ConnectionVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'connections';
	}
}