<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 * @property ContactOnListVO[] $listContacts - key is ListID, value Contact - use getter() instead of direct access
 */
class ContactCollectionVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * For the first list-contact
	 * @return string
	 */
	public function getEmail() {
		return $this->getFirstContact()->email;
	}

	/**
	 * For the first list-contact
	 * @return string
	 */
	public function getName() {
		return $this->getFirstContact()->name;
	}

	/**
	 * @return ContactOnListVO
	 */
	public function getFirstContact() {
		$aContacts = $this->getListContacts();
		return array_shift( $aContacts );
	}

	/**
	 * @return string[]
	 */
	public function getListIds() {
		return array_keys( $this->getListContacts() );
	}

	/**
	 * @return string[]
	 */
	public function getListNames() {
		$aLists = [];
		foreach ( $this->getListContacts() as $sListId => $oSub ) {
			$aLists[ $sListId ] = $oSub->campaign[ 'name' ];
		}
		return $aLists;
	}

	/**
	 * @return ContactOnListVO[]
	 */
	public function getListContacts() {
		if ( !is_array( $this->listContacts ) ) {
			$this->listContacts = [];
		}
		return $this->listContacts;
	}

	/**
	 * @param string $sIdOrName
	 * @return bool
	 */
	public function isOnList( $sIdOrName ) {
		return in_array( $sIdOrName, $this->getListNames() ) || in_array( $sIdOrName, $this->getListIds() );
	}

	/**
	 * @return bool
	 */
	public function isValid() {
		return parent::isValid() && !empty( $this->getListContacts() );
	}
}