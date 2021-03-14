<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 */
class RetrieveAll extends SendInBlue\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * Note the MemberVO data here is limited to 'email', 'listid', 'id', 'blacklisted'
	 * @return MemberVO[]
	 */
	public function retrieve() {

		$aAll = [];

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
					$aAll = array_merge( $aAll, $aMembers );
					$nOffset += $nPageLimit;
					continue;
				}
			}
			catch ( \Exception $oE ) {
			}
		} while ( !empty( $aMembers ) );

		return $aAll;
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
		$nListId = $this->list_id;
		if ( is_null( $nListId ) ) {
			$sEnd = 'contacts';
		}
		else {
			$sEnd = sprintf( 'contacts/lists/%s/contacts', $nListId );
		}
		return $sEnd;
	}
}