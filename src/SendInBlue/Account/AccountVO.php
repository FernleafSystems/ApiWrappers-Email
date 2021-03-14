<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Account;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Account
 */
class AccountVO extends BaseVO {

	/**
	 * @return array
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
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
		return $this->companyName;
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