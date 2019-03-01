<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Base extends ActiveCampaign\Api {

	/**
	 * @return ContactVO|null
	 */
	public function asVo() {
		return parent::asVo();
	}

	/**
	 * @return ContactVO
	 */
	protected function getVO() {
		return new ContactVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'contacts';
	}
}