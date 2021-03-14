<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Base extends ActiveCampaign\Api {

	const ENDPOINT_KEY = 'tag';

	protected function getVO() :TagVO{
		return new TagVO();
	}
}