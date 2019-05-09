<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Events;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Record
 * @package FernleafSystems\ApiWrappers\Email\Drip\Events
 */
class Record extends Drip\Api {

	const ENDPOINT_KEY = 'events';
	const REQUEST_METHOD = 'post';

	/**
	 * @param string $sAction
	 * @return $this
	 */
	public function setAction( $sAction ) {
		return $this->setRequestDataItem( 'action', $sAction );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

	/**
	 * @param bool $bIsProspect
	 * @return $this
	 */
	public function setIsProspect( $bIsProspect ) {
		return $this->setRequestDataItem( 'prospect', (bool)$bIsProspect );
	}

	/**
	 * @param int $nOccurredAt - unix timestamp
	 * @return $this
	 */
	public function setTime( $nOccurredAt ) {
		return $this->setRequestDataItem( 'occurred_at', $this->convertToStdDateFormat( $nOccurredAt ) );
	}

	/**
	 * @param string $sKey
	 * @param mixed  $mValue
	 * @return $this
	 */
	public function setProperty( $sKey, $mValue ) {
		$aProps = $this->getRequestDataItem( 'custom_fields' );
		if ( !is_array( $aProps ) ) {
			$aProps = [];
		}
		$aProps[ $sKey ] = $mValue;
		return $this->setProperties( $aProps );
	}

	/**
	 * @param array $aProps
	 * @return $this
	 */
	public function setProperties( $aProps ) {
		return $this->setRequestDataItem( 'properties', $aProps );
	}

	/**
	 * @return string
	 */
	protected function getRequestPayloadDataKey() {
		return static::ENDPOINT_KEY;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return static::ENDPOINT_KEY;
	}
}