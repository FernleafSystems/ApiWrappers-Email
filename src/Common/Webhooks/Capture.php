<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\ApiWrappers\Email\Common\Webhooks
 */
class Capture {

	/**
	 * @param array $aData
	 * @return WebhookVO
	 */
	public function fromArray( $aData ) {
		$oWebhook = new WebhookVO();
		if ( !empty( $aData ) && is_array( $aData ) ) {
			$oWebhook->applyFromArray( $aData );
		}
		return $oWebhook;
	}

	/**
	 * Uses 'php://input' to capture the raw webhook data
	 * @return WebhookVO
	 */
	public function fromInput() {
		return $this->fromJson( file_get_contents( 'php://input' ) );
	}

	/**
	 * @param string $sJson
	 * @return WebhookVO
	 */
	public function fromJson( $sJson ) {
		$aDecoded = [];

		if ( !empty( $sJson ) && is_string( $sJson ) ) {
			$aDecoded = json_decode( $sJson, true );
			if ( !is_array( $aDecoded ) ) {
				$aDecoded = [];
			}
		}

		return $this->fromArray( $aDecoded );
	}

	/**
	 * @return WebhookVO
	 */
	public function fromPost() {
		return $this->fromArray( $_POST );
	}
}