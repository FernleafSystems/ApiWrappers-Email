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
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'shopper_activity';
	}
}