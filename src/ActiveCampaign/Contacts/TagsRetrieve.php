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
		$this->id = $oContact->id;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aTags = $this->getDecodedResponseBody();
		}
		return $aTags;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( 'contacts/%s/contactTags', $this->id );
	}
}