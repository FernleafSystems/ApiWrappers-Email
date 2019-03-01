<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sId
	 * @return TagVO
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->setParam( 'id', $sId )->req();
		if ( $this->isLastRequestSuccess() ) {
			$aBody = $this->getDecodedResponseBody();
			$oVo = $this->getVO()->applyFromArray( $aBody[ 'tag' ] );
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