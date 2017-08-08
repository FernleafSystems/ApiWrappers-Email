<?php

namespace FernleafSystems\Apis\Email\Common\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\Apis\Email\Common\Webhooks
 */
class Capture {

	/**
	 * Uses 'php://input' to capture the raw webhook data
	 * @return WebhookVO
	 */
	public function captureFromInput() {
		$oWebhook = new WebhookVO();

		$sRawContent = file_get_contents( 'php://input' );
		if ( !empty( $sRawContent ) && is_string( $sRawContent ) ) {
			$aDecoded = json_decode( $sRawContent, true );
			if ( !empty( $aDecoded ) && is_array( $aDecoded ) ) {
				$oWebhook->applyFromArray( $aDecoded );
			}
		}

		return $oWebhook;
	}
}