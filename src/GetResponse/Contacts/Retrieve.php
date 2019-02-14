<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * Contacts in GR are emails on a given list. This means that for 1 email address, you will have as many "contacts"
	 * as this email is present on lists. So if it's on 3 lists, retrieving by email address would normally return 3
	 * contacts.
	 *
	 * To simplify things, we return 1 VO which is a combination of all the list data from the 3 separate contacts. To
	 * get an individual
	 * "contact" data for a particular email on a list, find the ID and query byId()
	 *
	 * @param string $sEmail
	 * @param bool   $bFull
	 * @return ContactVO
	 */
	public function byEmail( $sEmail, $bFull = false ) {
		$oVo = null;

		$this->setRequestQueryDataItem( 'query[email]', $sEmail )->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = $this->getVO();
			$aSubContacts = [];
			foreach ( $this->getDecodedResponseBody() as $aContactInfo ) {
				$oCL = ( new ContactOnListVO() )->applyFromArray( $aContactInfo );

				$sListId = $oCL->campaign[ 'campaignId' ];
				if ( $bFull ) {
					$aSubContacts[ $sListId ] = ( new Retrieve() )
						->setConnection( $this->getConnection() )
						->byId( $oCL->contactId );
				}
				else {
					$aSubContacts[ $sListId ] = $oCL;
				}
			}

			$oVo->listContacts = $aSubContacts;
		}
		return $oVo;
	}

	/**
	 * Each email on a list is considered a separate contact and has a separate ID.  So this requests returns that
	 * contact for that particular list.
	 * @param string $sId
	 * @return ContactOnListVO
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->setParam( 'id', $sId )->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = ( new ContactOnListVO() )->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oVo;
	}

	/**
	 * @return ContactVO|null
	 */
	public function asVo() {
		return parent::asVo();
	}

	/**
	 * @return ContactVO
	 */
	protected function getVO() {
		return new ContactVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		$sId = $this->getParam( 'id' );
		$sEndPoint = parent::getUrlEndpoint();
		return empty( $sId ) ? $sEndPoint : $sEndPoint.'/'.$sId;
	}
}