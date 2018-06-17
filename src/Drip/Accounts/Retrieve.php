<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class Retrieve extends RetrieveAll {

	/**
	 * @param string $sId
	 * @return AccountVO|null
	 */
	public function byId( $sId ) {
		return $this->setId( $sId )
					->asVo();
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setId( $sId ) {
		return $this->setParam( 'id', $sId );
	}

	/**
	 * @return AccountVO|null
	 */
	public function asVo() {
		$aAcs = parent::asVo();
		return array_pop( $aAcs );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'accounts/%s', rawurlencode( $this->getParam( 'id' ) ) );
	}
}