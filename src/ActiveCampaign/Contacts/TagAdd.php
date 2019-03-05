<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class TagAdd extends ActiveCampaign\Api {

	/**
	 * @param ContactVO $oContact
	 * @param string    $sTag
	 * @return $this
	 */
	public function run( $oContact, $sTag ) {
		return $this->setRequestDataItem(
			'contactTag',
			[
				'contact' => $oContact->id,
				'tag'     => $sTag,
			]
		);
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'contactTags';
	}
}