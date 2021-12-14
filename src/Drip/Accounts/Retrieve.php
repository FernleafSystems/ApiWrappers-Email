<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip;

class Retrieve extends RetrieveAll {

	/**
	 * @return AccountVO|null
	 */
	public function fromConnection() {
		/** @var Drip\Connection $oCon */
		$oCon = $this->getConnection();
		return $this->byId( $oCon->account_id );
	}

	/**
	 * @param string $sId
	 * @return AccountVO|null
	 */
	public function byId( $sId ) {
		return $this->setId( $sId )
					->asVO();
	}

	/**
	 * @return AccountVO|null
	 */
	public function asVO() {
		$aAcs = parent::asVOs();
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
		return static::ENDPOINT_KEY.'/'.rawurlencode( $this->getParam( 'id' ) );
	}
}