<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

class RetrieveAllOnList extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * Note the MemberVO data here is limited to 'email', 'listid', 'id', 'blacklisted'
	 * @return MemberVO[]
	 */
	public function retrieve() {

		$aAllMembers = array();

		$nOffset = 0;
		$nPageLimit = 50;
		do {
			$aMembers = null;
			$aResults = $this->setRequestDataItem( 'offset', $nOffset )
							 ->setRequestDataItem( 'limit', $nPageLimit )
							 ->send()
							 ->getDecodedResponseBody();

			if ( is_array( $aResults ) && isset( $aResults[ 'contacts' ] ) ) {
				$aMembers = array_map(
					function ( $aMember ) {
						return ( new MemberVO() )->applyFromArray( $aMember );
					},
					$aResults[ 'contacts' ]
				);
				$aAllMembers = array_merge( $aAllMembers, $aMembers );
				$nOffset += $nPageLimit;
				continue;
			}
		} while ( !empty( $aMembers ) );

		return $aAllMembers;
	}

	/**
	 * @param int $nListId
	 * @return $this
	 */
	public function setListId( $nListId ) {
		return $this->setParam( 'list_id', $nListId );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'contacts/lists/%s/contacts', $this->getParam( 'list_id' ) );
	}
}