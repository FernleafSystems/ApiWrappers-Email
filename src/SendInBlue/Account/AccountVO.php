<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Account;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Account
 */
class AccountVO {

	use StdClassAdapter;

	/**
	 * @return array
	 */
	public function getAddress() {
		return $this->getArrayParam( 'address' );
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->getStringParam( 'firstName' );
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->getStringParam( 'lastName' );
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->getAddress()[ 'city' ];
	}

	/**
	 * @return string
	 */
	public function getCompanyName() {
		return $this->getStringParam( 'companyName' );
	}

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->getAddress()[ 'country' ];
	}

	/**
	 * @return string
	 */
	public function getPostalCode() {
		return $this->getAddress()[ 'zipCode' ];
	}
}