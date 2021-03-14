<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class MemberVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 * @property array  $attributes
 * @property string $email
 * @property bool   $emailBlacklisted
 * @property array  $listIds
 * @property array  $list_unsubscribed
 */
class MemberVO extends BaseVO {

	/**
	 * @param string $sKey
	 * @return mixed|null
	 */
	public function getAttribute( $sKey ) {
		$aAttrs = $this->getAttributes();
		return isset( $aAttrs[ $sKey ] ) ? $aAttrs[ $sKey ] : null;
	}

	/**
	 * @return array
	 */
	public function getAttributes() {
		return $this->attributes;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 * @deprecated is this valid/used?
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * These are all the lists a user is subscribed to excluding those they're unsubscribed from.
	 * @return array
	 */
	public function getActiveListIds() {
		return array_diff( $this->getListIds(), $this->getUnsubscribedListIds() );
	}

	/**
	 * @return array
	 */
	public function getListIds() {
		return $this->listIds;
	}

	/**
	 * @return array
	 */
	public function getUnsubscribedListIds() {
		return $this->list_unsubscribed;
	}

	/**
	 * @return bool
	 * @deprecated
	 */
	public function isBlacklisted() {
		return $this->isGloballyBlacklisted();
	}

	public function isGloballyBlacklisted() :bool {
		return (bool)( $this->emailBlacklisted ?? false );
	}

	/**
	 * IMPORTANT: Does not check for whether they are unsubscribed. Instead use isSubscribedToList()
	 * @param int $nListId
	 * @return bool
	 */
	public function isOnList( $nListId ) {
		return in_array( $nListId, $this->getListIds() );
	}

	/**
	 * Must check unsubscribe list as the user subscribed list will retain the list ID even
	 * after unsubscribe.
	 * @param int $nListId
	 * @return bool
	 */
	public function isSubscribedToList( $nListId ) {
		return in_array( $nListId, $this->getActiveListIds() );
	}

	/**
	 * @param int $nListId
	 * @return bool
	 */
	public function isUnsubscribedFromList( $nListId ) {
		return in_array( $nListId, $this->getUnsubscribedListIds() );
	}
}