<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Workflows;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Remove
 * @package FernleafSystems\ApiWrappers\Email\Drip\Workflows
 */
class Remove extends Drip\Api {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setSubscriber( $sEmail ) {
		return $this->setParam( 'sub_email', $sEmail );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setWorkflowId( $sId ) {
		return $this->setParam( 'workflow_id', $sId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'workflows/%s/subscribers/:id_or_email', $this->getParam( 'workflow_id' ), $this->getParam( 'sub_email' ) );
	}
}