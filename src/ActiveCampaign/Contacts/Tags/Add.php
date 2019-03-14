<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts\Tags;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Add
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts\Tags
 */
class Add extends Base {

	/**
	 * @param string $sTagName
	 * @return $this
	 */
	public function setTagByName( $sTagName ) {
		$oTag = ( new ActiveCampaign\Tags\Find() )
			->setConnection( $this->getConnection() )
			->byName( $sTagName );
		if ( $oTag instanceof ActiveCampaign\Tags\TagVO ) {
			$this->setRequestDataItem( 'tag', $oTag->id );
		}
		return $this;
	}

	/**
	 * @param string $sTagId
	 * @return $this
	 */
	public function setTagById( $sTagId ) {
		return $this->setRequestDataItem( 'tag', $sTagId );
	}

	/**
	 * @param string $sId
	 * @return Add
	 */
	public function setContactId( $sId ) {
		return $this->setRequestDataItem( 'contact', $sId );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}