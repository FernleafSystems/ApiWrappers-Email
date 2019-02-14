<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\GetResponse
 */
class Api extends \FernleafSystems\ApiWrappers\Base\BaseApi {

	/**
	 * @return $this
	 */
	public function req() {
		try {
			$this->send();
		}
		catch ( \Exception $oE ) {
		}
		return $this;
	}

	/**
	 * @return BaseVO|mixed|null
	 */
	public function asVo() {
		$oVo = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oVo = $this->getVO()->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oVo;
	}

	/**
	 * @return BaseVO|mixed
	 */
	protected function getVO() {
		return new BaseVO();
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestHeader( 'X-Auth-Token', sprintf( 'api-key %s', $this->getConnection()->getApiKey() ) );
		return parent::prepFinalRequestData();
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getBaseUrl(), '/' ).'/';
	}
}