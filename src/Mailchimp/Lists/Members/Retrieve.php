<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

use FernleafSystems\ApiWrappers\Email\Mailchimp\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Retrieve extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		return $this->byId( md5( $sEmail ) );
	}

	/**
	 * @param string $sId ID, otherwise known as the subscriber hash (md5).
	 * @return MemberVO|null
	 */
	public function byId( $sId ) {
		$aResult = $this->setMemberId( $sId )
						->send()
						->getDecodedResponseBody();
		$oMember = null;
		if ( is_array( $aResult ) && !empty( $aResult ) ) {
			$oMember = ( new MemberVO() )->applyFromArray( $aResult );
		}
		return $oMember;
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setListId( $sId ) {
		return $this->setParam( 'list_id', $sId );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setMemberId( $sId ) {
		return $this->setParam( 'member_id', $sId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'lists/%s/members/%s', $this->getParam( 'list_id' ), $this->getParam( 'member_id' ) );
	}
}
