<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

use FernleafSystems\ApiWrappers\Email\Mailchimp;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Base extends Mailchimp\Api {

	/**
	 * @return string
	 */
	public function getListId() {
		return $this->list_id;
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setListId( $sId ) {
		$this->list_id = $sId;
		return $this;
	}

	/**
	 * @param string $sEmail
	 * @return string
	 */
	protected function idFromEmail( $sEmail ) {
		return md5( strtolower( $sEmail ) );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		if ( is_null( $this->list_id ) ) {
			throw new \Exception( 'List ID is not specified.' );
		}
	}
}
