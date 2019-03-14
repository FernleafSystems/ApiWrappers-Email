<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Events;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

class Track extends ActiveCampaign\Api {

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setContactEmail( $sEmail ) {
		return $this->setParam( 'contact_email', $sEmail );
	}

	/**
	 * @param string $sEvent - case sensitive
	 * @return $this
	 */
	public function setEventName( $sEvent ) {
		return $this->setRequestDataItem( 'event', $sEvent );
	}

	/**
	 * @param string $sData
	 * @return $this
	 */
	public function setEventData( $sData ) {
		return $this->setRequestDataItem( 'eventdata', $sData );
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var ActiveCampaign\Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getEventsTrackingUrl(), '/' );
	}

	/**
	 * @return string
	 */
	public function getDataChannel() {
		return 'form_params';
	}

	/**
	 * @return bool
	 */
	public function getRequestContentType() {
		return $this->getStringParam( 'request_content_type', 'application/x-www-form-urlencoded' );
	}

	/**
	 * @return array
	 */
	public function getRequestData() {
		/** @var ActiveCampaign\Connection $oCon */
		$oCon = $this->getConnection();

		$aExtraData = [
			'actid' => $oCon->events_account_id,
			'key'   => $oCon->events_tracking_key,
			'visit' => json_encode( [ 'email' => $this->getStringParam( 'contact_email' ) ] )
		];

		return array_merge(
			parent::getRequestData(),
			$aExtraData
		);
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		/** @var ActiveCampaign\Connection $oCon */
		$oCon = $this->getConnection();
		if ( empty( $oCon->events_account_id ) ) {
			throw new \Exception( 'Attempting to make Tracking request without Events Account ID' );
		}
		if ( empty( $oCon->events_tracking_key ) ) {
			throw new \Exception( 'Attempting to make Tracking request without Events Key' );
		}
		$sEmail = $this->getStringParam( 'contact_email' );
		if ( empty( $sEmail ) ) {
			throw new \Exception( 'Attempting to make Tracking request without a contact Email' );
		}
	}

	/**
	 * @return string[]
	 */
	protected function getCriticalRequestItems() {
		return [ 'event', 'eventdata' ];
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return '';
	}
}
