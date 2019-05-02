<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Tags;

/**
 * Class RemoveFromSubscriber
 * @package FernleafSystems\ApiWrappers\Email\Drip\Tags
 */
class RemoveFromSubscriber extends Base {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setParam( 'email', $sEmail );
	}

	/**
	 * @param string $sTag
	 * @return $this
	 */
	public function setTag( $sTag ) {
		return $this->setParam( 'tag', $sTag );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'subscribers/%s/tags/%s',
			rawurlencode( $this->getParam( 'email' ) ),
			rawurlencode( $this->getParam( 'tag' ) )
		);
	}
}