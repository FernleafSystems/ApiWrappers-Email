<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers
 */
class Base extends ActiveCampaign\DeepData\Base\DeepDataBase {

	const ENDPOINT_KEY = 'ecomCustomer';

	protected function getVO() :CustomerVO{
		return new CustomerVO();
	}
}