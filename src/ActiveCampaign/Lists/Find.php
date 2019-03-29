<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Common\Pagination;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use Pagination;

	/**
	 * @param string $sName
	 * @param bool   $bIgnoreCase
	 * @return ListVO|null
	 */
	public function byName( $sName, $bIgnoreCase = true ) {
		$oTheList = null;

		if ( $bIgnoreCase ) {
			$sName = strtolower( $sName );
		}
		foreach ( $this->run() as $oList ) {
			if ( $sName === $oList->name || ( $bIgnoreCase && $sName === strtolower( $oList->name ) ) ) {
				$oTheList = $oList;
				break;
			}
		}
		return $oTheList;
	}

	/**
	 * @return ListVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return static::ENDPOINT_KEY.'s';
	}
}