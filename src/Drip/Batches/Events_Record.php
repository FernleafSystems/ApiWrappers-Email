<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Batches;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Events_Record
 * @package FernleafSystems\ApiWrappers\Email\Drip\Batches
 */
class Events_Record extends Base {

	/**
	 * @param array $aEventData - should contain keys: email, action
	 * @return $this
	 */
	public function addEventData( $aEventData ) {
		$aEvents = $this->getRequestDataItem( 'events' );
		if ( !is_array( $aEvents ) ) {
			$aEvents = [];
		}
		$aEvents[] = $aEventData;
		return $this->setRequestDataItem( 'events', $aEvents );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', 'events', parent::getUrlEndpoint() );
	}
}