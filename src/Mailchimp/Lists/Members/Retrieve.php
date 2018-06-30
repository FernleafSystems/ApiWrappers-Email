<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		return $this->byId( $this->idFromEmail( $sEmail ) );
	}

	/**
	 * @param string $sId - otherwise known as subscriber hash (md5).
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
	public function setMemberId( $sId ) {
		return $this->setParam( 'member_id', $sId );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( is_null( $this->getParam( 'member_id' ) ) ) {
			throw new \Exception( 'Member ID is not specified.' );
		}
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'lists/%s/members/%s', $this->getListId(), $this->getParam( 'member_id' ) );
	}
}
