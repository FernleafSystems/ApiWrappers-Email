<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Orders
 */
class Create extends Base {

	/**
	 * @return OrderVO|null
	 */
	public function create() {
		$oConnection = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oConnection = $this->getVO()
								->applyFromArray( $this->getDecodedResponseBody()[ static::ENDPOINT_KEY ] );
		}
		return $oConnection;
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setConnectionId( $sId ) {
		return $this->setRequestDataItem( 'connectionid', $sId );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setExternalId( $sId ) {
		return $this->setRequestDataItem( 'externalid', $sId );
	}

	/**
	 * @param bool $bAccepts
	 * @return $this
	 */
	public function setAcceptsMarketing( $bAccepts ) {
		return $this->setRequestDataItem( 'logoUrl', $bAccepts ? 1 : 0 );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}