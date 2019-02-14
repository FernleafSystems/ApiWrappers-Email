<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 * @property string contactId
 * @property string href
 * @property string name
 * @property string email
 * @property string note
 * @property string origin
 * @property string dayOfCycle
 * @property string changedOn
 * @property string timeZone
 * @property string ipAddress
 * @property string createdOn
 * @property array  campaign
 * @property array  customFieldValues
 * @property array  geolocation
 * @property array  tags
 */
class ContactVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @return int
	 */
	public function getCreatedAt() {
		return strtotime( $this->createdOn );
	}

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->getCreatedAt() );
	}

	/**
	 * @param string $sFieldId
	 * @return mixed|null
	 */
	public function getCustomField( $sFieldId ) {
		$aFields = $this->getCustomFields();
		return isset( $aFields[ $sFieldId ] ) ? $aFields[ $sFieldId ] : null;
	}

	/**
	 * @return array
	 */
	public function getCustomFields() {
		return $this->getArrayParam( 'custom_fields' );
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * This uses the default custom file key: first_name
	 * @return string
	 */
	public function getFirstName() {
		return $this->getCustomField( 'first_name' );
	}

	/**
	 * This uses the default custom file key: last_name
	 * @return string
	 */
	public function getLastName() {
		return $this->getCustomField( 'last_name' );
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->getStringParam( 'id' );
	}

	/**
	 * @return string
	 */
	public function getLeadScore() {
		return $this->getStringParam( 'lead_score' );
	}

	/**
	 * @return string
	 */
	public function getLifetimeValue() {
		return $this->getStringParam( 'lifetime_value' );
	}

	/**
	 * all, active, unsubscribed, active_or_unsubscribed or undeliverable. Defaults to active
	 * @return string
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}

	/**
	 * @return array
	 */
	public function getTags() {
		return $this->getArrayParam( 'tags' );
	}

	/**
	 * @return string
	 */
	public function getUserId() {
		return $this->getStringParam( 'user_id' );
	}

	/**
	 * @param string $sTag
	 * @param bool   $bCaseSensitive
	 * @return bool
	 */
	public function hasTag( $sTag, $bCaseSensitive = true ) {
		return in_array(
			$bCaseSensitive ? $sTag : strtolower( $sTag ),
			$bCaseSensitive ? $this->getTags() : array_map( 'strtolower', $this->getTags() )
		);
	}
}