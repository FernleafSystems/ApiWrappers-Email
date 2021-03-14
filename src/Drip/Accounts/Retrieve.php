<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 * @property string $id
 */
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
	 * @param string $id
	 * @return AccountVO|null
	 */
	public function byId( $id ) {
		return $this->setId( $id )->asVO();
	}

	public function asVO() :?AccountVO {
		$aAcs = parent::asVOs();
		return array_pop( $aAcs );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setId( $sId ) {
		$this->id = $sId;
		return $this;
	}

	protected function getUrlEndpoint() :string {
		return static::ENDPOINT_KEY.'/'.rawurlencode( $this->id );
	}
}