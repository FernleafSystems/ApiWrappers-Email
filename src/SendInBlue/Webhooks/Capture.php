<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Webhooks;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Capture
 * @package FernleafSystems\Apis\Email\SendInBlue\Webhooks
 */
class Capture {

	use StdClassAdapter;

	/**
	 * @param string $sRawContent
	 * @return WebhookVO|null
	 */
	public function capture( $sRawContent = null ) {
		$oWebhook = null;

		if ( is_null( $sRawContent ) ) {
			$sRawContent = file_get_contents( 'php://input' );
		}

		if ( !empty( $sRawContent ) && is_string( $sRawContent ) ) {
			$aDecoded = json_decode( $sRawContent, true );
			if ( !empty( $aDecoded ) && is_array( $aDecoded ) ) {
				$oWebhook = ( new WebhookVO() )->applyFromArray( $aDecoded );
			}
		}

		return $oWebhook;
	}
}