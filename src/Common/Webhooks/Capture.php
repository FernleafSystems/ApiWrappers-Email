<?php

namespace FernleafSystems\Apis\Email\Common\Webhooks;

/**
 * Class Capture
 * @package FernleafSystems\Apis\Email\Common\Webhooks
 */
class Capture {

	/**
	 * Uses 'php://input' to capture the raw webhook data
	 * @param string $sRawContent
	 * @return WebhookVO
	 */
	public function captureFromInput( $sRawContent = null ) {
		$oWebhook = new WebhookVO();

		if ( is_null( $sRawContent ) ) {
			$sRawContent = file_get_contents( 'php://input' );
		}
		if ( !empty( $sRawContent ) && is_string( $sRawContent ) ) {
			$aDecoded = json_decode( $sRawContent, true );
			if ( !empty( $aDecoded ) && is_array( $aDecoded ) ) {
				$oWebhook->applyFromArray( $aDecoded );
			}
		}

		return $oWebhook;
	}
}