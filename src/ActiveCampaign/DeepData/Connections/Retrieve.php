<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sServiceId
	 * @return ConnectionVO|null
	 */
	public function byService( $sServiceId ) {
		$aFindResults = ( new Find() )
			->setConnection( $this->getConnection() )
			->filterByService( $sServiceId )
			->run();
		return array_shift( $aFindResults );
	}

	/**
	 * @param string $sId
	 * @return ConnectionVO|null
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->setParam( 'id', $sId )->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = $this->getVO()
						->applyFromArray( $this->getDecodedResponseBody()[ static::ENDPOINT_KEY ] );
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