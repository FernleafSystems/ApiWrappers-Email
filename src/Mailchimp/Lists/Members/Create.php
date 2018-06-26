<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

use FernleafSystems\ApiWrappers\Email\Mailchimp\Api;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class Create extends Api {

	const REQUEST_METHOD = 'post';

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email_address', $sEmail );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setListId( $sId ) {
		return $this->setParam( 'list_id', $sId );
	}

	/**
	 * @param array $aMergeFields
	 * @return $this
	 */
	public function setMergeFields( $aMergeFields ) {
		return $this->setRequestDataItem( 'merge_fields', $aMergeFields );
	}

	/**
	 * @param string $sStatus
	 * @return $this
	 */
	public function setStatus( $sStatus ) {
		return $this->setRequestDataItem( 'status', $sStatus );
	}

	/**
	 * @return $this
	 */
	public function setStatusCleaned() {
		return $this->setStatus( 'cleaned' );
	}

	/**
	 * @return $this
	 */
	public function setStatusPending() {
		return $this->setStatus( 'pending' );
	}

	/**
	 * @return $this
	 */
	public function setStatusSubscribed() {
		return $this->setStatus( 'subscribed' );
	}

	/**
	 * @return $this
	 */
	public function setStatusUnsubscribed() {
		return $this->setStatus( 'unsubscribed' );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'lists/%s/members', $this->getParam( 'list_id' ) );
	}
}