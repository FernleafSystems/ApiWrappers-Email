<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Common\Pagination;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';
	use Pagination;

	/**
	 * @param string $sName
	 * @param bool   $bIgnoreCase
	 * @return TagVO|null
	 */
	public function byName( $sName, $bIgnoreCase = true ) {
		$oTheTag = null;

		if ( $bIgnoreCase ) {
			$sName = strtolower( $sName );
		}
		foreach ( $this->run() as $oTag ) {
			if ( $sName === $oTag->tag || ( $bIgnoreCase && $sName === strtolower( $oTag->tag ) ) ) {
				$oTheTag = $oTag;
				break;
			}
		}
		return $oTheTag;
	}

	/**
	 * @return TagVO[]
	 */
	public function run() {
		return $this->runPagedQuery();
	}

	/**
	 * @return string
	 */
	protected function getResponseDataKey() {
		return 'tags';
	}
}