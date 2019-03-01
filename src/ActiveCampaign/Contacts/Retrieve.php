<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

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
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ) );
	}
}