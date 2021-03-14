<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Account;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Account
 * @property $member_since
 * @property $account_id
 * @property $account_name
 * @property $login_id
 * @property $email
 * @property $first_name
 * @property $last_name
 * @property $total_subscribers
 * @property $username
 * @property $pro_enabled
 */
class AccountVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getAccountCreationDate() {
		return $this->member_since;
	}

	/**
	 * @return string
	 */
	public function getAccountId() {
		return $this->account_id;
	}

	/**
	 * @return string
	 */
	public function getAccountName() {
		return $this->account_name;
	}

	/**
	 * @return string
	 */
	public function getLoginId() {
		return $this->login_id;
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
		return $this->first_name;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @return string
	 */
	public function getTotalSubscribers() {
		return $this->total_subscribers;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	public function isPro() :bool {
		return (bool)$this->pro_enabled;
	}
}