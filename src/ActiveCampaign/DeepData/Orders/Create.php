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
		$oOrder = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oOrder = $this->getVO()
						   ->applyFromArray( $this->getDecodedResponseBody()[ static::ENDPOINT_KEY ] );
		}
		return $oOrder;
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
	 * @param string $sId - The Customer ID as it is on ActiveCampaign
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
	 * @param int|string $nTimestamp - unix timestamp or full string e.g. 2016-09-13T17:41:39-04:00
	 * @return $this
	 */
	public function setOrderDate( $nTimestamp ) {
		if ( is_int( $nTimestamp ) ) {
			$nTimestamp = date( 'c', $nTimestamp );
		}
		return $this->setRequestDataItem( 'orderDate', $nTimestamp );
	}

	/**
	 * @param string $mVal
	 * @return $this
	 */
	public function setOrderNumber( $mVal ) {
		return $this->setRequestDataItem( 'orderNumber', $mVal );
	}

	/**
	 * @param array[] $aProducts
	 * @return $this
	 */
	public function setOrderProducts( $aProducts ) {
		if ( is_array( $aProducts ) ) {
			$this->setRequestDataItem( 'orderProducts', $aProducts );
		}
		return $this;
	}

	/**
	 * @param string $mVal
	 * @return $this
	 */
	public function setOrderUrl( $mVal ) {
		return $this->setRequestDataItem( 'orderUrl', $mVal );
	}

	/**
	 * @param string $sSource
	 * @return $this
	 */
	public function setSource( $sSource = '1' ) {
		return $this->setRequestDataItem( 'source', $sSource );
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
	public function getRequestDataFinal() :array{
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}