<?php

namespace FernleafSystems\Apis\Email\Mailchimp;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\ResponseInterface;

abstract class BaseApi {

	use ConnectionConsumer,
		StdClassAdapter;

	const REQUEST_METHOD = 'post';

	/**
	 * @var ResponseInterface
	 */
	protected $oLastResponse;

	/**
	 * @var RequestException
	 */
	protected $oLastError;

	/**
	 * @var Client
	 */
	protected $oHttp;

	/**
	 * @param Connection $oConnection
	 */
	public function __construct( $oConnection = null ) {
		$this->setConnection( $oConnection );
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return '';
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function send() {
		$bError = $this
			->sendQuery()
			->hasError();

		$sResponse = '';
		if ( !$bError ) {
			$sResponse = json_decode( $this->getLastApiResponse()->getBody() );
		}
		return $sResponse;
	}

	/**
	 * By default uses post().
	 * @return $this
	 * @throws \Exception
	 */
	public function sendQuery() {
		$this->preSendVerification();

		$oClient = $this->getHttpRequest();
		$oRequest = $oClient->createRequest(
			$this->getHttpRequestMethod(),
			$this->getMethod(),
			$this->prepFinalRequestData()
		);
		try {
			$this->setLastError( null )
				 ->setLastApiResponse( $oClient->send( $oRequest ) );
		}
		catch ( RequestException $oRE ) {
			$this->setLastError( $oRE );
		}
		return $this;
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$aFinal = array(
			'headers' => array(
				'Accept'        => Constants::Content_Type,
				'Content-Type'  => Constants::Content_Type,
				'Authorization' => 'apikey ' . $this->getConnection()->getApiKey()
			),
			'base_url' => sprintf( Constants::Url_Base, explode( '-', $this->getConnection()->getApiKey()[ 1 ] ) ),
		);

		$sDataBodyKey = ( $this->getHttpRequestMethod() == 'get' ) ? 'query' : 'json';
		$aFinal[ $sDataBodyKey ] = $this->getRequestDataFinal();

		return $aFinal;
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		if ( is_null( $this->getConnection() ) ) {
			throw new \Exception( 'Attempting to make API request without a Connection' );
		}
	}

	/**
	 * @return Client
	 */
	public function getHttpRequest() {
		if ( empty( $this->oHttp ) ) {
			$this->oHttp = new Client();
		}
		return $this->oHttp;
	}

	/**
	 * @return string
	 */
	public function getHttpRequestMethod() {
		$sMethod = static::REQUEST_METHOD;
		if ( !in_array( static::REQUEST_METHOD, array( 'get', 'head', 'patch', 'post', 'put', 'delete' ) ) ) {
			$sMethod = 'get';
		}
		return strtolower( $sMethod );
	}

	/**
	 * @return ResponseInterface
	 */
	public function getLastApiResponse() {
		return $this->oLastResponse;
	}

	/**
	 * @return RequestException
	 */
	public function getLastError() {
		return $this->oLastError;
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
	 * @return bool
	 */
	public function hasError() {
		return !is_null( $this->getLastError() );
	}

	/**
	 * @param ResponseInterface $oLastApiResponse
	 * @return $this
	 */
	public function setLastApiResponse( $oLastApiResponse ) {
		$this->oLastResponse = $oLastApiResponse;
		return $this;
	}

	/**
	 * @param RequestException $oLastError
	 * @return $this
	 */
	public function setLastError( $oLastError ) {
		$this->oLastError = $oLastError;
		return $this;
	}

	/**
	 * @param string $sItemKey
	 * @return $this
	 */
	public function removeRequestDataItem( $sItemKey ) {
		$aData = $this->getRequestData();
		if ( array_key_exists( $sItemKey, $aData ) ) {
			unset( $aData[ $sItemKey ] );
			$this->setRequestData( $aData, false );
		}
		return $this;
	}

	/**
	 * @param array $aNewData
	 * @param bool  $bMerge
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
	 * @param mixed  $mValue
	 * @return $this
	 */
	public function setRequestDataItem( $sKey, $mValue ) {
		$aData = $this->getRequestData();
		$aData[ $sKey ] = $mValue;
		$this->setRequestData( $aData, false );
		return $this;
	}

	/**
	 * This is call right at the point of setting the data for the HTTP Request and should only
	 * ever be used for that purpose.  use getRequestData() otherwise.
	 * @return array
	 */
	public function getRequestDataFinal() {
		return $this->getRequestData();
	}
}