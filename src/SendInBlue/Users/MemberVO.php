<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class MemberVO
 * @package FernleafSystems\Apis\Email\SendInBlue\Users
 */
class MemberVO {

	use StdClassAdapter;

	/**
	 * TODO: test
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
	 * @return array
	 */
	public function getListIds() {
		return $this->getArrayParam( 'listid' );
	}

	/**
	 * @param int $nListId
	 * @return bool
	 */
	public function isSubscribedToList( $nListId ) {
		return in_array( $nListId, $this->getListIds() );
	}
}