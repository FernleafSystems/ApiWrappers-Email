<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class MemberVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 */
class MemberVO {

	use StdClassAdapter;

	/**
	 * @return mixed
	 */
	public function getAttribute( $sKey ) {
		$aAttrs = $this->getAttributes();
		return isset( $aAttrs[ $sKey ] ) ? $aAttrs[ $sKey ] : null;
	}

	/**
	 * @return array
	 */
	public function getAttributes() {
		return $this->getArrayParam( 'attributes' );
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * @deprecated is this valid/used?
	 * @return string
	 */
	public function getId() {
		return $this->getNumericParam( 'id' );
	}

	/**
	 * @return array
	 */
	public function getListIds() {
		return $this->getArrayParam( 'listid' );
	}

	/**
	 * @return array
	 */
	public function getUnsubscribedListId() {
		return $this->getArrayParam( 'list_unsubscribed' );
	}

	/**
	 * @deprecated
	 * @return bool
	 */
	public function isBlacklisted() {
		return $this->isGloballyBlacklisted();
	}

	/**
	 * @return bool
	 */
	public function isGloballyBlacklisted() {
		return ( $this->getParam( 'blacklisted', 0 ) == 1 );
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
		return $this->isOnList( $nListId ) && !$this->isUnsubscribedFromList( $nListId );
	}

	/**
	 * @param int $nListId
	 * @return bool
	 */
	public function isUnsubscribedFromList( $nListId ) {
		return in_array( $nListId, $this->getUnsubscribedListId() );
	}
}