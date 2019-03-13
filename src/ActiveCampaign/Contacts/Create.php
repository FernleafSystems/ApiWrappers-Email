<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Create extends Base {

	/**
	 * @return ContactVO|null
	 */
	public function create() {
		$oContact = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oContact = $this->getVO()
							 ->applyFromArray( $this->getDecodedResponseBody()[ static::ENDPOINT_KEY ] );
		}
		return $oContact;
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', strtolower( trim( $sEmail ) ) );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		$aClean = ( new CleanNames() )->names( $sName, '' );
		return $this->setRequestDataItem( 'firstName', $aClean[ 0 ] );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		$aClean = ( new CleanNames() )->names( $sName, '' );
		return $this->setRequestDataItem( 'lastName', $aClean[ 0 ] );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setName( $sName ) {
		$aClean = ( new CleanNames() )->names( $sName, '' );
		return $this->setFirstName( $aClean[ 0 ] )
					->setLastName( $aClean[ 1 ] );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}