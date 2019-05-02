<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * We need to temporarily override the Connection to v3 as this is a new API addition.
 * Class BaseShopperActivity
 * @package FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity
 */
class BaseShopperActivity extends Drip\Api {

	/**
	 * @param Drip\Connection $oConnection
	 * @return $this
	 */
	public function setConnection( $oConnection ) {
		$oConn = clone $oConnection;
		$oConn->override_api_version = 3;
		return parent::setConnection( $oConn );
	}
}