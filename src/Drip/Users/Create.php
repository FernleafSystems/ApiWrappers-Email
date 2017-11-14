<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

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
		$aTags = $this->getRequestDataItem( 'tags' );
		if ( is_null( $aTags ) || !is_array( $aTags ) ) {
			$aTags = array();
		}
		if ( !in_array( $sTag, $aTags ) ) {
			$aTags[] = $sTag;
		}
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
	 * @param mixed $mFieldValue
	 * @return Create
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