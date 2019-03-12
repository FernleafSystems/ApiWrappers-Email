<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Add extends Base {

	/**
	 * @param ActiveCampaign\Contacts\ContactVO $oContact
	 * @param string                            $sTagId
	 * @return $this
	 */
	public function run( $oContact, $sTagId ) {
		return $this->setRequestDataItem( 'contact', $oContact->id )
					->setRequestDataItem( 'tag', $sTagId );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}