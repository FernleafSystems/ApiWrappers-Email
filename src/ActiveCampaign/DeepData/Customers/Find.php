<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Common\Pagination;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use Pagination;

	/**
	 * @return CustomerVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
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
	 * @param string $sId
	 * @return $this
	 */
	public function filterByConnectionId( $sId ) {
		return $this->setRequestDataItem( 'filters[connectionid]', $sId );
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return static::ENDPOINT_KEY.'s';
	}
}