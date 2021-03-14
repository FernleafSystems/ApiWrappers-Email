<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue;

class RetrieveAllOnList extends SendInBlue\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * Note the MemberVO data here is limited to 'email', 'listid', 'id', 'blacklisted'
	 * @return MemberVO[]
	 * @deprecated use RetrieveAll
	 */
	public function retrieve() {

		$aAllMembers = [];

		$nOffset = 0;
		$nPageLimit = 50;
		do {
			$aMembers = null;
			try {
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
			}
			catch ( \Exception $oE ) {
			}
		} while ( !empty( $aMembers ) );

		return $aAllMembers;
	}

	/**
	 * @param int $nListId
	 * @return $this
	 */
	public function setListId( $nListId ) {
		$this->list_id = $nListId;
		return $this;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return sprintf( 'contacts/lists/%s/contacts', $this->list_id );
	}
}