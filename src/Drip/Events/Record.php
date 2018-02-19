<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Events;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Record
 * @package FernleafSystems\ApiWrappers\Email\Drip\Events
 */
class Record extends Drip\Api {

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
		return $this->setRequestDataItem( 'occurred_at', date( 'c', $nOccurredAt ) );
	}

	/**
	 * @param string $sKey
	 * @param mixed  $mValue
	 * @return $this
	 */
	public function setProperty( $sKey, $mValue ) {
		$aProps = $this->getRequestDataItem( 'custom_fields' );
		if ( !is_array( $aProps ) ) {
			$aProps = array();
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
	 * It's rare to override this Final data request, but when creating subscribers the data for
	 * the new subscriber needs to be wrapped up in an array.
	 * @return array
	 */
	public function getRequestDataFinal() {
		return array( 'events' => array( $this->getRequestData() ) );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'events';
	}
}