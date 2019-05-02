<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class MemberVO
 * @deprecated
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class MemberVO extends PeopleVO {

	/**
	 * @return string
	 * @deprecated
	 */
	public function getCreatedAt() {
		return $this->created_at;
	}

	/**
	 * @return string[]
	 * @deprecated
	 */
	public function getCustomFields() {
		return $this->custom_fields;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getLeadScore() {
		return $this->lead_score;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getLifetimeValue() {
		return $this->lifetime_value;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return string[]
	 * @deprecated
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getUserId() {
		return $this->user_id;
	}
}