<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue;

/**
 * Class Count
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 */
class Count extends SendInBlue\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param int $nListId
	 * @return int
	 */
	public function count( $nListId = null ) {
		$nCount = 0;
		if ( is_numeric( $nListId ) ) {
			$this->setListId( $nListId );
		}
		if ( $this->req()->isLastRequestSuccess() ) {
			$nCount = $this->getDecodedResponseBody()[ 'count' ];
		}
		return $nCount;
	}

	/**
	 * @param int $nListId
	 * @return $this
	 */
	protected function setListId( $nListId ) {
		return $this->setParam( 'list_id', $nListId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		$nListId = $this->getParam( 'list_id' );
		return is_numeric( $nListId ) ? sprintf( 'contacts/lists/%s/contacts', $nListId ) : 'contacts';
	}
}