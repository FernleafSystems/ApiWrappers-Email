<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Users
 * @property array contact
 */
class ContactVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getCreatedAt() {
		return $this->contact[ 'cdate' ];
	}

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->getCreatedAt() );
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->contact[ 'email' ];
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->contact[ 'firstName' ];
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->contact[ 'lastName' ];
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->contact[ 'contactData' ];
	}

	/**
	 * @return int[]
	 */
	public function getLists() {
		return $this->contact[ 'contactLists' ];
	}
}