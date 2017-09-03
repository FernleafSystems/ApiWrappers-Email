<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class SendInBlue
 * @package Fernleaf\EmailMarketing
 */
class Api extends BaseApi {

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$sBase = sprintf( $oCon->getBaseUrl(), explode( '-', $oCon->getApiKey() )[ 1 ] );
		return rtrim( $sBase, '/' ) . '/';
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestHeader( 'api-key', $this->getConnection()->getApiKey() );
		return parent::prepFinalRequestData();
	}

	/**
	 * @param string $sEmailAddress
	 * @param string $sNewEmail
	 * @return bool
	 * @throws SIB_UserDoesNotExistException
	 */
	public function updateUserEmail( $sEmailAddress, $sNewEmail ) {
		// SendInBlue doesn't permit the "changing" of a user email address, so instead we find
		// all lists that the current email is on and remove them, and create a new user and subscribe to those lists
		$aUserData = $this->getUserData( $sEmailAddress );
		if ( empty( $aUserData ) ) {
			throw new SIB_UserDoesNotExistException( sprintf( 'Attempting to change update the email of user that does not exist: "%s"', $sEmailAddress ) );
		}
		$aCurrentLists = $aUserData[ 'listid' ];

		// Create and populate the new user.
		$this->subscribeUserToList( $sNewEmail, $aCurrentLists );
		if ( !isset( $aUserData['attributes']['NOTES'] ) ) {
			$aUserData[ 'attributes' ][ 'NOTES' ] = '';
		}
		$aUserData[ 'attributes' ][ 'NOTES' ] = ' ||'.sprintf( 'Previous Email Address was %s.', $sEmailAddress );
		$this->updateUserDetails( $sNewEmail, $aUserData['attributes'] );

		// Remove old user from all lists.
		$this->unsubscribeUserFromAllLists( $sEmailAddress );
		return $this->success();
	}

	/**
	 * @return bool
	 */
	public function success() {
		$bSuccess = false;
		$aLastResponse = $this->getLastApiResponse();
		if ( !empty( $aLastResponse ) && is_array( $aLastResponse ) && isset( $aLastResponse[ 'code' ] ) ) {
			$bSuccess = ( $aLastResponse[ 'code' ] == 'success' );
		}
		return $bSuccess;
	}

	/**
	 * @param string $sApiFunction
	 * @param array $aRequestData
	 * @return bool
	 */
	public function doApiCall( $sApiFunction, $aRequestData = array() ) {
		try {
			$this->directApiCall( $sApiFunction, $aRequestData );
		}
		catch( \Exception $oE ) {
			$this->mLastApiResponse = null;
		}
		return $this->success();
	}

	/**
	 * @return \Sendinblue\Mailin
	 */
	protected function getApi() {
		return $this->oApi;
	}

	/**
	 * @param string $sApiFunction
	 * @param array $aRequestData
	 * @return $this
	 * @throws ApiMethodDoesNotExistException
	 */
	protected function directApiCall( $sApiFunction, $aRequestData ) {
		$oApi = $this->getApi();
		if ( !method_exists( $oApi, $sApiFunction ) ) {
			throw new ApiMethodDoesNotExistException( sprintf( 'The API function "%s" is not defined.', $sApiFunction ) );
		}
		$this->setLastApiFunction( $sApiFunction );
		$this->mLastApiResponse = $oApi->{$sApiFunction}( $aRequestData );
		return $this;
	}
}

class SIB_UserDoesNotExistException extends \Exception { }
class SIB_UserAlreadyExistsException extends \Exception { }