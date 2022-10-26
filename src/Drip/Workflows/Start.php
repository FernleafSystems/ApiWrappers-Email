<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Workflows;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Start
 * @package FernleafSystems\ApiWrappers\Email\Drip\Workflows
 */
class Start extends Drip\Api {

	const REQUEST_METHOD = 'post';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function addSubscriber( $sEmail ) {
		return $this->addSubscribers( [ $sEmail ] );
	}

	/**
	 * @param string[] $aNewSubs
	 * @return $this
	 */
	public function addSubscribers( $aNewSubs ) {
		$aSubs = $this->getRequestDataItem( 'subscribers' );
		if ( !is_array( $aSubs ) ) {
			$aSubs = [];
		}

		if ( !is_array( $aNewSubs ) ) {
			$aNewSubs = [ $aNewSubs ];
		}

		foreach ( $aNewSubs as $sSub ) {
			$aSubs[] = [ 'email' => $sSub ];
		}

		return $this->setRequestDataItem( 'subscribers', $aSubs );
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
		return sprintf( 'workflows/%s/subscribers', $this->workflow_id );
	}
}