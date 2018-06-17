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
	 * @return string
	 */
	public function getAddress() {
		return $this->getStringParam( 'address' );
	}

	/**
	 * @return string
	 */
	public function getClientId() {
		return $this->getParam( 'client_id' );
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
		return $this->getStringParam( 'first_name' );
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->getStringParam( 'last_name' );
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->getStringParam( 'city' );
	}

	/**
	 * @return string
	 */
	public function getCompanyName() {
		return $this->getStringParam( 'company' );
	}

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->getStringParam( 'country' );
	}

	/**
	 * @return string
	 */
	public function getPostalCode() {
		return $this->getStringParam( 'zip_code' );
	}
}