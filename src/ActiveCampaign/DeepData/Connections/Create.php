<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class Create extends ActiveCampaign\Api {

	/**
	 * @return ConnectionVO|null
	 */
	public function create() {
		$oConnection = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oConnection = $this->getVO()
								->applyFromArray( $this->getDecodedResponseBody()[ 'connection' ] );
		}
		return $oConnection;
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setExternalId( $sId ) {
		return $this->setRequestDataItem( 'externalid', $sId );
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setLinkUrl( $sUrl ) {
		return $this->setRequestDataItem( 'linkUrl', $sUrl );
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setLogoUrl( $sUrl ) {
		return $this->setRequestDataItem( 'logoUrl', $sUrl );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setName( $sName ) {
		return $this->setRequestDataItem( 'name', $sName );
	}

	/**
	 * @param string $sService
	 * @return $this
	 */
	public function setService( $sService ) {
		return $this->setRequestDataItem( 'service', $sService );
	}

	/**
	 * @return ConnectionVO
	 */
	protected function getVO() {
		return new ConnectionVO();
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ 'connection' => parent::getRequestDataFinal() ];
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'connections';
	}
}