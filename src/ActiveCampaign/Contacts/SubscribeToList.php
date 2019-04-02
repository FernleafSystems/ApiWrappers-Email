<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class SubscribeToList
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class SubscribeToList extends Base {

	const ENDPOINT_KEY = 'contactList';

	/**
	 * @return $this
	 */
	public function subscribe() {
		return $this->setSubscriptionStatus( true )
					->req();
	}

	/**
	 * @return $this
	 */
	public function unsubscribe() {
		return $this->setSubscriptionStatus( false )
					->req();
	}

	/**
	 * @param string $nId
	 * @return $this
	 */
	public function setContactId( $nId ) {
		return $this->setRequestDataItem( 'contact', $nId );
	}

	/**
	 * @param string $nId
	 * @return $this
	 */
	public function setListId( $nId ) {
		return $this->setRequestDataItem( 'list', $nId );
	}

	/**
	 * @param bool $bSubscribed - true to subscribe, false to unsubscribe
	 * @return $this
	 */
	public function setSubscriptionStatus( $bSubscribed ) {
		return $this->setRequestDataItem( 'status', $bSubscribed ? 1 : 2 );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() {
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}