<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

use FernleafSystems\Apis\Email\SendInBlue\Api;

class RemoveFromList extends Api {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sUserEmail
	 * @return $this
	 */
	public function setUserToRemove( $sUserEmail ) {
		return $this->setUsersToRemove( [ $sUserEmail ] );
	}

	/**
	 * @param string[] $aUserEmails
	 * @return $this
	 */
	public function setUsersToRemove( $aUserEmails ) {
		return $this->setRequestDataItem( 'users', $aUserEmails );
	}

	/**
	 * @param int $nListId
	 * @return $this
	 */
	public function setList( $nListId ) {
		return $this->setParam( 'list_id', $nListId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'list/%s/delusers', $this->getParam( 'list_id' ) );
	}
}