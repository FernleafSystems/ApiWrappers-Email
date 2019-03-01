<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Base extends ActiveCampaign\Api {

	/**
	 * @return TagVO
	 */
	protected function getVO() {
		return new TagVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'tags';
	}
}