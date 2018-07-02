<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Tags;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class ApplyToSubscriber
 * @package FernleafSystems\ApiWrappers\Email\Drip\Tags
 */
class ApplyToSubscriber extends Drip\Api {

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
	 * @return array
	 */
	public function getRequestDataFinal() {
		return array( 'tags' => array( $this->getRequestData() ) );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'tags';
	}
}