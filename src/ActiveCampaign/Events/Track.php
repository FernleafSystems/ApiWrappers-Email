<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Events;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Track
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Events
 * @property string $contact_email
 */
class Track extends ActiveCampaign\Api {

	/**
	 * @param string $email
	 * @return $this
	 */
	public function setContactEmail( $email ) {
		$this->contact_email = $email;
		return $this;
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
	protected function getBaseUrl() :string {
		/** @var ActiveCampaign\Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getEventsTrackingUrl(), '/' );
	}

	/**
	 * @return string
	 */
	public function getDataChannel() :string {
		return 'form_params';
	}

	public function getRequestContentType() :string {
		return 'application/x-www-form-urlencoded';
	}

	public function getRequestData() :array {
		/** @var ActiveCampaign\Connection $oCon */
		$oCon = $this->getConnection();
		return array_merge(
			parent::getRequestData(),
			[
				'actid' => $oCon->events_account_id,
				'key'   => $oCon->events_tracking_key,
				'visit' => json_encode( [ 'email' => $this->contact_email ] )
			]
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
		$sEmail = $this->contact_email;
		if ( empty( $sEmail ) ) {
			throw new \Exception( 'Attempting to make Tracking request without a contact Email' );
		}
	}

	protected function getCriticalRequestItems() :array {
		return [ 'event', 'eventdata' ];
	}

	protected function getUrlEndpoint() :string {
		return '';
	}
}
