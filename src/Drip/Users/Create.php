<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @return PeopleVO|null
	 */
	public function create() {
		$oMemberVO = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aResp = $this->getDecodedResponseBody();
			if ( !empty( $aResp[ static::ENDPOINT_KEY ] ) ) {
				$oMemberVO = $this->getVO()->applyFromArray( array_shift( $aResp[ static::ENDPOINT_KEY ] ) );
			}
		}
		return $oMemberVO;
	}

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
			$aTags = [];
		}
		if ( !is_array( $aNewTags ) ) {
			$aNewTags = [ $aNewTags ];
		}
		return $this->setRequestDataItem( 'tags', array_unique( array_merge( $aTags, $aNewTags ) ) );
	}

	/**
	 * @param string $sTag
	 * @return $this
	 */
	public function removeTag( $sTag ) {
		$aTags = $this->getRequestDataItem( 'remove_tags' );
		if ( !is_array( $aTags ) ) {
			$aTags = [];
		}
		$aTags[] = $sTag;
		return $this->setRequestDataItem( 'remove_tags', array_unique( $aTags ) );
	}

	/**
	 * @param string $sFieldKey
	 * @param mixed  $mFieldValue
	 * @return $this
	 */
	public function setCustomField( $sFieldKey, $mFieldValue ) {
		$aFields = $this->getRequestDataItem( 'custom_fields' );
		if ( !is_array( $aFields ) ) {
			$aFields = [];
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
		return $this->setRequestDataItem( 'email', strtolower( $sEmail ) );
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
	 * @return string
	 */
	protected function getRequestPayloadDataKey() {
		return static::ENDPOINT_KEY;
	}
}