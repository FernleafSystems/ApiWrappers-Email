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
		$this->id = $sId;
		return $this->req()
					->isLastRequestSuccess();
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->id );
	}
}