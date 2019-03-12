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
	 * @param string $sCurrencyIso3
	 * @return $this
	 */
	public function setCurrency( $sCurrencyIso3 ) {
		return $this->setRequestDataItem( 'currency', strtoupper( $sCurrencyIso3 ) );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setCustomerId( $sId ) {
		return $this->setRequestDataItem( 'customerid', $sId );
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
	 * @param int $nTimestamp
	 * @return $this
	 */
	public function setOrderDate( $nTimestamp ) {
		return $this->setRequestDataItem( 'orderDate', date( 'c', $nTimestamp ) );
	}

	/**
	 * @param string $mVal
	 * @return $this
	 */
	public function setOrderNumber( $mVal ) {
		return $this->setRequestDataItem( 'orderNumber', $mVal );
	}

	/**
	 * @param string $mVal
	 * @return $this
	 */
	public function setOrderUrl( $mVal ) {
		return $this->setRequestDataItem( 'orderUrl', $mVal );
	}

	/**
	 * @param string $mVal
	 * @return $this
	 */
	public function setTotalPrice( $mVal ) {
		return $this->setRequestDataItem( 'totalPrice', $mVal );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}