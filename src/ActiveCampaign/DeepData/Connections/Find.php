<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Common\Pagination;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use Pagination;

	/**
	 * Note that the information supplied for each contact is lighter than if you retrieve an
	 * individual.
	 * @return ConnectionVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return 'connections';
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ) );
	}
}