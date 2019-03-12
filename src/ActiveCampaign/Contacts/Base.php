<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Base extends ActiveCampaign\Api {

	const ENDPOINT_KEY = 'contact';

	/**
	 * @return ContactVO
	 */
	protected function getVO() {
		return new ContactVO();
	}
}