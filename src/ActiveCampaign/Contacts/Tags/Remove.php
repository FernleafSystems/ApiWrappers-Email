<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Remove
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts\Tags
 */
class Remove extends ActiveCampaign\Api {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sContactTagId
	 * @return $this
	 */
	public function run( $sContactTagId ) {
		return $this->setParam( 'contactTagId', $sContactTagId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'contactTagId' ) );
	}
}