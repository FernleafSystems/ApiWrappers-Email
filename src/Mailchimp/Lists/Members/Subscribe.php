<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

/**
 * Class Subscribe
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Subscribe extends Update {

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		$this->setStatusSubscribed();
		return parent::byEmail( $sEmail );
	}
}