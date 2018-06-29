<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Account;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Account
 */
class AccountVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getAccountCreationDate() {
		return $this->getStringParam( 'member_since' );
	}

	/**
	 * @return string
	 */
	public function getAccountId() {
		return $this->getStringParam( 'account_id' );
	}

	/**
	 * @return string
	 */
	public function getAccountName() {
		return $this->getStringParam( 'account_name' );
	}

	/**
	 * @return string
	 */
	public function getLoginId() {
		return $this->getParam( 'login_id' );
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
	public function getTotalSubscribers() {
		return $this->getStringParam( 'total_subscribers' );
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->getStringParam( 'username' );
	}

	/**
	 * @return bool
	 */
	public function isPro() {
		return (bool)$this->getParam( 'pro_enabled' );
	}
}