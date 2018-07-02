<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

/**
 * Class Unsubscribe
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Unsubscribe extends Update {

	/**
	 * @param string $sEmail
	 * @return MemberVO|null
	 */
	public function byEmail( $sEmail ) {
		$this->setStatusUnsubscribed();
		return parent::byEmail( $sEmail );
	}
}