<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class RetrieveMetaInfo
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class RetrieveMetaInfo extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		return $this->setParam( 'id', $oContact->id );
	}

	/**
	 * @return array[]
	 */
	public function data() {
		return $this->retrieveMeta( 'contactData' );
	}

	/**
	 * @return array[]
	 */
	public function lists() {
		return $this->retrieveMeta( 'contactLists' );
	}

	/**
	 * @return array[]
	 */
	public function notes() {
		return $this->retrieveMeta( 'notes' );
	}

	/**
	 * @return array[]
	 */
	public function tags() {
		return $this->retrieveMeta( 'contactTags' );
	}

	/**
	 * @param string $sKey
	 * @return array[]
	 */
	public function retrieveMeta( $sKey ) {
		$aInfo = null;
		$this->setParam( 'meta', $sKey )->req();
		if ( $this->isLastRequestSuccess() ) {
			$aInfo = $this->getDecodedResponseBody()[ $sKey ];
		}
		return $aInfo;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ), $this->getParam( 'meta' ) );
	}
}