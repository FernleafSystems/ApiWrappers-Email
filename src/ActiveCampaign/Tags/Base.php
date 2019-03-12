<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Base extends ActiveCampaign\Api {

	const ENDPOINT_KEY = 'tag';

	/**
	 * @return TagVO
	 */
	protected function getVO() {
		return new TagVO();
	}
}