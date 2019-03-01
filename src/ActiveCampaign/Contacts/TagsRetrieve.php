<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class TagsRetrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class TagsRetrieve extends ActiveCampaign\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param ContactVO $oContact
	 * @return array
	 */
	public function run( $oContact ) {
		$aTags = [];
		$this->setParam( 'id', $oContact->id )->req();
		if ( $this->isLastRequestSuccess() ) {
			$aTags = $this->getDecodedResponseBody();
		}
		return $aTags;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'contacts/%s/contactTags', $this->getParam( 'id' ) );
	}
}