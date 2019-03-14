<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use ActiveCampaign\Common\Pagination;

	/**
	 * @return OrderVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function filterByServiceConnectionId( $sId ) {
		return $this->setRequestDataItem( 'filters[connectionid]', $sId );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function filterByEmail( $sEmail ) {
		return $this->setRequestDataItem( 'filters[email]', $sEmail );
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