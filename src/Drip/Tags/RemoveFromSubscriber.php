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
		$this->email = $sEmail;
		return $this;
	}

	/**
	 * @param string $sTag
	 * @return $this
	 */
	public function setTag( $sTag ) {
		$this->tag = $sTag;
		return $this;
	}

	protected function getUrlEndpoint() :string  {
		return sprintf( 'subscribers/%s/tags/%s',
			rawurlencode( $this->email ),
			rawurlencode( $this->tag )
		);
	}
}