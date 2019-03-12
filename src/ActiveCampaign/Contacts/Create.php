<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Create extends Base {

	public function create() {
		$oContact = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oContact = $this->getVO()
							 ->applyFromArray( $this->getDecodedResponseBody()[ 'contact' ] );
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
	 * @param string $sEmail
	 * @return ContactVO
	 */
	public function byEmail( $sEmail ) {
		$oContact = null;
		$aContacts = ( new Find() )
			->setConnection( $this->getConnection() )
			->filterByEmail( $sEmail )
			->run();
		if ( !empty( $aContacts ) ) {
			/** @var ContactVO $oContact */
			$oContact = array_shift( $aContacts );
			// Contact data that comes through
			$oContact = $this->byId( $oContact->id );
		}
		return $oContact;
	}

	/**
	 * @param string $sId
	 * @return ContactVO
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->setParam( 'id', $sId )->req();
		if ( $this->isLastRequestSuccess() ) {
			$aBody = $this->getDecodedResponseBody();
			$oVo = $this->getVO()->applyFromArray( $aBody[ 'contact' ] );
			$oVo->meta = $aBody;
		}
		return $oVo;
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ) );
	}
}