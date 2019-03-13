<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Common\Pagination;

/**
 * Class Find
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
	 * @param string $sService
	 * @return $this
	 */
	public function filterByService( $sService ) {
		return $this->setRequestDataItem( 'filters[service]', $sService );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function filterByExternalId( $sId ) {
		return $this->setRequestDataItem( 'filters[externalid]', $sId );
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return static::ENDPOINT_KEY.'s';
	}
}