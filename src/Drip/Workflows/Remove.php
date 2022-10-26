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
		$this->sub_email = $sEmail;
		return $this;
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setWorkflowId( $sId ) {
		$this->workflow_id = $sId;
		return $this;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( 'workflows/%s/subscribers/%s', $this->workflow_id, $this->sub_email );
	}
}