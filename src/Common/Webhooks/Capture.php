<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Webhooks;

class Capture {

	/**
	 * @param array $data
	 * @return WebhookVO
	 */
	public function fromArray( $data ) {
		$webhook = new WebhookVO();
		if ( !empty( $data ) && is_array( $data ) ) {
			$webhook->applyFromArray( $data );
		}
		return $webhook;
	}

	/**
	 * Uses 'php://input' to capture the raw webhook data
	 * @return WebhookVO
	 */
	public function fromInput() {
		return $this->fromJson( file_get_contents( 'php://input' ) );
	}

	/**
	 * @param string $json
	 * @return WebhookVO
	 */
	public function fromJson( $json ) {
		$decoded = [];

		if ( !empty( $json ) && is_string( $json ) ) {
			$decoded = json_decode( $json, true );
			if ( !is_array( $decoded ) ) {
				$decoded = [];
			}
		}

		return $this->fromArray( $decoded );
	}

	/**
	 * @return WebhookVO
	 */
	public function fromPost() {
		return $this->fromArray( $_POST );
	}
}