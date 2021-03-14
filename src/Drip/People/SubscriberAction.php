<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

/**
 * Trait SubscriberAction
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
trait SubscriberAction {

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setEmail( $sVal ) {
		$this->sub_identifier = $sVal;
		return $this;
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setId( $sVal ) {
		$this->sub_identifier = $sVal;
		return $this;
	}

	/**
	 * @return string - url-encoded
	 */
	private function getSubId() {
		return rawurlencode( $this->sub_identifier );
	}
}