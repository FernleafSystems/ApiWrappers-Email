<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class FilterConsumer
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
trait FilterConsumer {

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function filterByEmail( $sValue ) {
		return $this->filterBy( 'email', $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function filterByEmailContains( $sValue ) {
		return $this->filterBy( 'email_like', $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function filterByListId( $sValue ) {
		return $this->filterBy( 'listid', $sValue );
	}

	/**
	 * @param string $sField
	 * @param mixed  $sValue
	 * @return $this
	 */
	public function filterBy( $sField, $sValue ) {
		return $this->setRequestDataItem( $sField, $sValue );
	}
}