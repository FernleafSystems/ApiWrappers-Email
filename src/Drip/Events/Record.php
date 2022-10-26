<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Events;

use FernleafSystems\ApiWrappers\Email\Drip;

class Record extends Drip\Api {

	const ENDPOINT_KEY = 'events';
	const REQUEST_METHOD = 'post';

	/**
	 * @param string $action
	 * @return $this
	 */
	public function setAction( $action ) {
		return $this->setRequestDataItem( 'action', $action );
	}

	/**
	 * @param string $email
	 * @return $this
	 */
	public function setEmail( $email ) {
		return $this->setRequestDataItem( 'email', $email );
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

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY;
	}
}