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
			$aSubs = array();
		}

		if ( !is_array( $aNewSubs ) ) {
			$aNewSubs = array( $aNewSubs );
		}

		foreach ( $aNewSubs as $sSub ) {
			$aSubs[] = array( 'email' => $sSub );
		}

		return $this->setRequestDataItem( 'subscribers', $aSubs );
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
		return sprintf( 'workflows/%s/subscribers', $this->getParam( 'workflow_id' ) );
	}
}