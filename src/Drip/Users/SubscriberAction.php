<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Trait SubscriberAction
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
trait SubscriberAction {

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setEmail( $sVal ) {
		return $this->setParam( 'sub_identifier', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setId( $sVal ) {
		return $this->setParam( 'sub_identifier', $sVal );
	}

	/**
	 * @return string - url-encoded
	 */
	private function getSubId() {
		return rawurlencode( $this->getStringParam( 'sub_identifier' ) );
	}
}