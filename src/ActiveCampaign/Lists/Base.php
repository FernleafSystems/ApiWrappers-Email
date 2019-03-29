<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Base extends ActiveCampaign\Api {

	const ENDPOINT_KEY = 'list';

	/**
	 * @return ListVO
	 */
	protected function getVO() {
		return new ListVO();
	}
}