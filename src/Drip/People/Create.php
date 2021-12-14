<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

use FernleafSystems\ApiWrappers\Email\Common\Data\CleanNames;

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
	 * @param string $sConsent - granted, denied, unknown
	 * @return $this
	 */
	public function setEuConsent( $sConsent = 'granted' ) {
		return $this->setRequestDataItem( 'eu_consent', $sConsent );
	}

	/**
	 * @param int $sTZ - in Olsen, e.g America/Los_Angeles
	 * @return $this
	 */
	public function setTimezone( $sTZ ) {
		return $this->setRequestDataItem( 'time_zone', $sTZ );
	}

	/**
	 * @param int $nOffset - in minutes
	 * @return $this
	 */
	public function setUtcOffset( $nOffset ) {
		return $this->setRequestDataItem( 'utc_offset', $nOffset );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUserAgent( $sVal ) {
		return $this->setRequestDataItem( 'user_agent', $sVal );
	}

	/**
	 * @param string $sIp
	 * @return $this
	 */
	public function setIpAddress( $sIp ) {
		return $this->setRequestDataItem( 'ip_address', $sIp );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setLandingUrl( $sVal ) {
		return $this->setRequestDataItem( 'landing_url', $sVal );
	}

	/**
	 * @param bool $bIs
	 * @return $this
	 */
	public function setIsProspect( $bIs ) {
		return $this->setRequestDataItem( 'prospect', $bIs );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setOriginalReferrer( $sVal ) {
		return $this->setRequestDataItem( 'original_referrer', $sVal );
	}

	/**
	 * @param int $nScore - starting lead score
	 * @return $this
	 */
	public function setBaseLeadScore( $nScore ) {
		return $this->setRequestDataItem( 'base_lead_score', $nScore );
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