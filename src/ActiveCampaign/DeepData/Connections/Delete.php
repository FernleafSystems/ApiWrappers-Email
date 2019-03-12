<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections
 */
class Delete extends Base {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sId
	 * @return bool
	 */
	public function byId( $sId ) {
		return $this->setParam( 'id', $sId )
					->req()
					->isLastRequestSuccess();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ) );
	}
}