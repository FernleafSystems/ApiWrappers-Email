<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class Delete extends Base {

	const REQUEST_METHOD = 'delete';

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
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return parent::getUrlEndpoint().'/'.rawurlencode( $this->getStringParam( 'sub_identifier' ) );
	}
}