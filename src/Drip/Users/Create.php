<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;
use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Create extends Drip\Api {

	const REQUEST_METHOD = 'post';

	/**
	 * @param string $sTag
	 * @return $this
	 */
	public function addTag( $sTag ) {
		return $this->addTags( [ $sTag ] );
	}

	/**
	 * @param array $aNewTags
	 * @return $this
	 */
	public function addTags( $aNewTags ) {
		$aTags = $this->getRequestDataItem( 'tags' );
		if ( !is_array( $aTags ) ) {
			$aTags = array();
		}

		if ( !is_array( $aNewTags ) ) {
			$aNewTags = array( $aNewTags );
		}

		$aTags = array_unique( array_merge( $aTags, $aNewTags ) );
		return $this->setRequestDataItem( 'tags', $aTags );
	}

	/**
	 * @param string $sTag
	 * @return $this
	 */
	public function removeTag( $sTag ) {
		$aTags = $this->getRequestDataItem( 'remove_tags' );
		if ( is_null( $aTags ) || !is_array( $aTags ) ) {
			$aTags = array();
		}
		if ( !in_array( $sTag, $aTags ) ) {
			$aTags[] = $sTag;
		}
		return $this->setRequestDataItem( 'remove_tags', $aTags );
	}

	/**
	 * @param string $sFieldKey
	 * @param mixed  $mFieldValue
	 * @return $this
	 */
	public function setCustomField( $sFieldKey, $mFieldValue ) {
		$aFields = $this->getRequestDataItem( 'custom_fields' );
		if ( is_null( $aFields ) || !is_array( $aFields ) ) {
			$aFields = array();
		}
		$aFields[ $sFieldKey ] = $mFieldValue;
		return $this->setCustomFields( $aFields );
	}

	/**
	 * @param array $aFields
	 * @return $this
	 */
	public function setCustomFields( $aFields ) {
		return $this->setRequestDataItem( 'custom_fields', $aFields );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setCustomField( 'first_name', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		return $this->setCustomField( 'last_name', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setName( $sName ) {
		list( $sFirst, $sLast ) = ( new CleanNames() )->name( $sName );
		return $this->setFirstName( $sFirst )
					->setLastName( $sLast );
	}

	/**
	 * @param int $nValue - in cents, not floats
	 * @return $this
	 */
	public function setLifetimeValue( $nValue ) {
		return $this->setRequestDataItem( 'lifetime_value', (int)round( $nValue ) );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setUserId( $sId ) {
		return $this->setRequestDataItem( 'user_id', $sId );
	}

	/**
	 * It's rare to override this Final data request, but when creating subscribers the data for
	 * the new subscriber needs to be wrapped up in an array.
	 * @return array
	 */
	public function getRequestDataFinal() {
		return array( 'subscribers' => array( $this->getRequestData() ) );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}