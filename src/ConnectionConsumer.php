<?php

namespace FernleafSystems\Apis\Email\Mailchimp;

trait ConnectionConsumer {

	/**
	 * @var Connection
	 */
	private $oConnection;

	/**
	 * @return Connection
	 */
	public function getConnection() {
		return $this->oConnection;
	}

	/**
	 * @param Connection $oConnection
	 * @return $this
	 */
	public function setConnection( $oConnection ) {
		$this->oConnection = $oConnection;
		return $this;
	}
}