<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Find extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * Note that the information supplied for each contact is lighter than if you retrieve an
	 * individual.
	 * @return ContactVO[]
	 */
	public function run() {
		$aContacts = [];

		if ( $this->req()->isLastRequestSuccess() ) {
			$aData = $this->getDecodedResponseBody();
			if ( !empty( $aData[ 'contacts' ] ) && is_array( $aData[ 'contacts' ] ) ) {
				$aContacts = array_map(
					function ( $aContact ) {
						return $this->getVO()->applyFromArray( $aContact );
					},
					$aData[ 'contacts' ]
				);
			}
		}

		return $aContacts;
	}

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

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getParam( 'id' ) );
	}
}