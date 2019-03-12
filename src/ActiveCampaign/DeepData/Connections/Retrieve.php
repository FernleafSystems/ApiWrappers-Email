<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sId
	 * @return ConnectionVO|null
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->setParam( 'id', $sId )->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = $this->getVO()->applyFromArray( $this->getDecodedResponseBody()[ 'connection' ] );
		}
		return $oVo;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ) );
	}
}