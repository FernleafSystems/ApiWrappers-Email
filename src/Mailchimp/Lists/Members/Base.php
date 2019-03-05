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
		return $this->getStringParam( 'list_id' );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setListId( $sId ) {
		return $this->setParam( 'list_id', $sId );
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

		if ( is_null( $this->getParam( 'list_id' ) ) ) {
			throw new \Exception( 'List ID is not specified.' );
		}
	}
}
