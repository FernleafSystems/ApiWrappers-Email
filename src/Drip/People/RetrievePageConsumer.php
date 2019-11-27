<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

/**
 * Trait RetrievePageConsumer
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
trait RetrievePageConsumer {

	/**
	 * @var RetrievePage
	 */
	private $oRetrievePager;

	/**
	 * Use this to apply filters to the pager
	 * @return RetrievePage
	 */
	public function getPageRetriever() {
		if ( !isset( $this->oPager ) ) {
			$this->oRetrievePager = ( new RetrievePage() )->setConnection( $this->getConnection() );
		}
		return $this->oRetrievePager;
	}

	/**
	 * @param RetrievePage $oPageRetriever
	 * @return $this
	 */
	public function setPageRetriever( RetrievePage $oPageRetriever ) {
		$this->oRetrievePager = $oPageRetriever;
		return $this;
	}

	/**
	 * @param string $sNewTag
	 * @return $this
	 */
	public function addTagToFilter( $sNewTag ) {
		$sTags = $this->getRequestDataItem( 'tags' );
		if ( !is_string( $sTags ) ) {
			$sTags = '';
		}
		$aTags = explode( ',', $sTags );
		$aTags[] = $sNewTag;

		$this->getPageRetriever()
			 ->setRequestDataItem( 'tags', implode( ',', array_unique( $aTags ) ) );
		return $this;
	}

	/**
	 * @param string $sStatus
	 * @return $this
	 */
	public function filterByStatus( $sStatus ) {
		$sStatus = strtolower( $sStatus );
		if ( in_array( $sStatus, [ 'active', 'unsubscribed', 'undeliverable', 'active_or_unsubscribed', 'all' ] ) ) {
			$this->getPageRetriever()
				 ->setRequestDataItem( 'status', $sStatus );
		}
		return $this;
	}

	/**
	 * @param int $nTimestamp
	 * @return $this
	 */
	public function filterBySubscribedAfter( $nTimestamp ) {
		return $this->filterByTimestampField( 'subscribed_after', $nTimestamp );
	}

	/**
	 * @param int $nTimestamp
	 * @return $this
	 */
	public function filterBySubscribedBefore( $nTimestamp ) {
		return $this->filterByTimestampField( 'subscribed_before', $nTimestamp );
	}

	/**
	 * @param string $sField
	 * @param int    $nTimestamp
	 * @return $this
	 */
	public function filterByTimestampField( $sField, $nTimestamp ) {
		$oPager = $this->getPageRetriever();
		$oPager->setRequestDataItem( $sField, $oPager->convertToStdDateFormat( $nTimestamp ) );
		return $this;
	}
}