<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Tags;

/**
 * Class ApplyToSubscriber
 * @package FernleafSystems\ApiWrappers\Email\Drip\Tags
 */
class ApplyToSubscriber extends Base {

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

	/**
	 * @param string $sTag
	 * @return $this
	 */
	public function setTag( $sTag ) {
		return $this->setRequestDataItem( 'tag', $sTag );
	}

	/**
	 * @return string
	 */
	protected function getRequestPayloadDataKey() {
		return static::ENDPOINT_KEY;
	}
}