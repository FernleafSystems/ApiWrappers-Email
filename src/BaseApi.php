<?php

namespace FernleafSystems\Apis\Email\Mailchimp;

use DrewM\MailChimp\MailChimp;
use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

class BaseApi {

	use ConnectionConsumer,
		StdClassAdapter;

	/**
	 * @var MailChimp
	 */
	protected $oMC;

	public function __construct() {
	}

	/**
	 * @return MailChimp
	 */
	public function getApi() {
		if ( !isset( $this->oMC ) ) {
			$this->oMC = new MailChimp( $this->getConnection()->getApiKey() );
		}
		return $this->oMC;
	}

	/**
	 * @return array|false
	 */
	public function send() {
		return $this->getApi()->{$this->getVerb()}( $this->getMethod(), $this->getRequestData() );
	}

	/**
	 * @return array
	 */
	public function getRequestData() {
		return $this->getArrayParam( 'reqdata' );
	}

	/**
	 * @param string $sKey
	 * @return mixed|null
	 */
	public function getRequestDataItem( $sKey ) {
		$aData = $this->getRequestData();
		return isset( $aData[ $sKey ] ) ? $aData[ $sKey ] : null;
	}

	/**
	 * @param array $aNewData
	 * @param bool $bMerge
	 * @return $this
	 */
	public function setRequestData( $aNewData, $bMerge = true ) {
		if ( $bMerge ) {
			$aNewData = array_merge( $this->getRequestData(), $aNewData );
		}
		return $this->setParam( 'reqdata', $aNewData );
	}

	/**
	 * @param string $sKey
	 * @param mixed $mValue
	 * @return $this
	 */
	public function setRequestDataItem( $sKey, $mValue ) {
		$aData = $this->getRequestData();
		$aData[ $sKey ] = $mValue;
		$this->setRequestData( $aData, false );
		return $this;
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return '';
	}

	/**
	 * @return string
	 */
	protected function getVerb() {
		return 'get';
	}
}
