<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;
use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param string $sFieldKey
	 * @param mixed  $mFieldValue
	 * @return $this
	 */
	public function setCustomField( $sFieldKey, $mFieldValue ) {
		$aFields = $this->getRequestDataItem( 'customFieldValues' );
		if ( !is_array( $aFields ) ) {
			$aFields = [];
		}
		$aFields[] = [
			'customFieldId' => $sFieldKey,
			'value'         => is_array( $mFieldValue ) ? $mFieldValue : [ $mFieldValue ]
		];
		return $this->setRequestDataItem( 'customFieldValues', $aFields );
	}

	/**
	 * @param int $nDay
	 * @return $this
	 */
	public function setDayOfCycle( $nDay = 0 ) {
		return $this->setRequestDataItem( 'dayOfCycle', $nDay );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', strtolower( $sEmail ) );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setListId( $sId ) {
		return $this->setRequestDataItem( 'campaign', [ 'campaignId' => $sId ] );
	}

	/**
	 * @param string $sName
	 * @return $this
	 * @throws \Exception
	 */
	public function setListName( $sName ) {
		$oList = ( new GetResponse\Lists\Retrieve() )
			->setConnection( $this->getConnection() )
			->byName( $sName );
		if ( empty( $oList ) ) {
			throw new \Exception( sprintf( 'List by name "%s" does not exist', $sName ) );
		}
		return $this->setListId( $oList->campaignId );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setName( $sName ) {
		list( $sFirst, $sLast ) = ( new CleanNames() )->name( $sName );
		return $this->setRequestDataItem( 'name', $sFirst.' '.$sLast );
	}

	protected function getCriticalRequestItems():array {
		return [ 'email', 'campaign', 'name' ];
	}
}