<?php

namespace FernleafSystems\Apis\Email\Mailchimp;

class Connection {

	/**
	 * @var string
	 */
	protected $sApiKey;

	/**
	 * @return string
	 */
	public function getApiKey() {
		return $this->sApiKey;
	}

	/**
	 * @return bool
	 */
	public function hasApiKey() {
		return !empty( $this->sApiKey );
	}

	/**
	 * @param string $sApiKey
	 * @return $this
	 */
	public function setApiKey( $sApiKey ) {
		$this->sApiKey = $sApiKey;
		return $this;
	}
}
