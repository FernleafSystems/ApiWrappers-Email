<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sName
	 * @return ListVO|null
	 */
	public function byName( $sName ) {
		return ( new Find() )
			->setConnection( $this->getConnection() )
			->byName( $sName );
	}

	/**
	 * @param string $sId
	 * @return ListVO
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->id = $sId;
		$this->req();
		if ( $this->isLastRequestSuccess() ) {
			$aBody = $this->getDecodedResponseBody();
			$oVo = $this->getVO()
						->applyFromArray( $aBody[ static::ENDPOINT_KEY ] );
		}
		return $oVo;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->id );
	}
}