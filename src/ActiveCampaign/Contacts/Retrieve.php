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
		$this->id = $sId;
		$this->req();
		if ( $this->isLastRequestSuccess() ) {
			$aBody = $this->getDecodedResponseBody();
			$oVo = $this->getVO()
						->applyFromArray( $aBody[ static::ENDPOINT_KEY ] );
			$oVo->meta = $aBody;
		}
		return $oVo;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->id );
	}
}