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
	 * @return bool
	 */
	public function isBlacklisted() {
		return ( $this->getParam( 'blacklisted', 0 ) == 1 );
	}

	/**
	 * @param int $nListId
	 * @return bool
	 */
	public function isSubscribedToList( $nListId ) {
		return in_array( $nListId, $this->getListIds() );
	}
}