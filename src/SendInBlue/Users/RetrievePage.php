<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue;

/**
 * Class RetrievePage
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 */
class RetrievePage extends SendInBlue\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @param int $nOffset
	 * @param int $nPageLimit
	 * @param int $nListId
	 * @return MemberVO[]
	 */
	public function retrieve( $nOffset, $nPageLimit, $nListId = null ) {
		$aMembers = [];

		if ( is_numeric( $nListId ) ) {
			$this->list_id = $nListId;
		}

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
			}
		}
		catch ( \Exception $oE ) {
		}

		return $aMembers;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		$nListId = $this->list_id;
		return is_numeric( $nListId ) ? sprintf( 'contacts/lists/%s/contacts', $nListId ) : 'contacts';
	}
}