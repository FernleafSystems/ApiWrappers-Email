<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * We need to temporarily override the Connection to v3 as this is a new API addition.
 */
class BaseShopperActivity extends Drip\Api {

	protected function getUrlEndpoint() :string {
		return 'shopper_activity';
	}
}