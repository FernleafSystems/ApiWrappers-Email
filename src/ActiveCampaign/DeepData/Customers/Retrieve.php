<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers;

use FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections\ConnectionVO;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Customers
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return CustomerVO|null
	 */
	public function byEmail( $sEmail ) {
		$aFindResults = ( new Find() )
			->setConnection( $this->getConnection() )
			->filterByEmail( $sEmail )
			->run();
		return array_shift( $aFindResults );
	}

	/**
	 * @param string       $sEmail
	 * @param ConnectionVO $oServiceConnection
	 * @return CustomerVO|null
	 */
	public function byEmailOnServiceConnection( $sEmail, $oServiceConnection ) {
		$aFindResults = ( new Find() )
			->setConnection( $this->getConnection() )
			->filterByEmail( $sEmail )
			->filterByConnectionId( $oServiceConnection->id )
			->run();
		return array_shift( $aFindResults );
	}

	/**
	 * @param string $sId
	 * @return CustomerVO|null
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