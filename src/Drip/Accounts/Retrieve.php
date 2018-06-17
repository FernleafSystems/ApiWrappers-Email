<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip\Connection;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class Retrieve extends RetrieveAll {

	/**
	 * @return AccountVO|null
	 */
	public function req() {
		return $this->asVo();
	}

	/**
	 * @return AccountVO|null
	 */
	public function fromConnection() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return $this->byId( $oCon->getAccountId() );
	}

	/**
	 * @param string $sId
	 * @return AccountVO|null
	 */
	public function byId( $sId ) {
		return $this->setId( $sId )
					->req();
	}

	/**
	 * @return AccountVO|null
	 */
	protected function asVo() {
		$aAcs = parent::asVo();
		return array_pop( $aAcs );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setId( $sId ) {
		return $this->setParam( 'id', $sId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'accounts/%s', rawurlencode( $this->getParam( 'id' ) ) );
	}
}