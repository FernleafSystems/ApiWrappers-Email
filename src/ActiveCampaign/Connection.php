<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign
 * @property string $events_account_id
 * @property string $events_tracking_key
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://%s.api-us1.com/api/%s';
	const API_VERSION = 3;
	const EVENT_TRACKING_API_URL = 'https://trackcmp.net/event';

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return sprintf( self::API_URL, $this->account_id, self::API_VERSION );
	}

	/**
	 * @return string
	 */
	public function getEventsTrackingUrl() {
		return sprintf( self::EVENT_TRACKING_API_URL );
	}
}
