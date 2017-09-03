<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

class RetrieveAllOnList extends Api {

	/**
	 * Note the MemberVO data here is limited to 'email', 'listid', 'id', 'blacklisted'
	 * @return MemberVO[]
	 */
	public function retrieve() {

		$aAllMembers = array();

		$nOffset = 1;
		do {
			$aMembers = null;
			$aResults = $this->setRequestDataItem( 'page', $nOffset )
							 ->setRequestDataItem( 'page_limit', 500 )
							 ->send()
							 ->getDecodedResponseBody();

			if ( is_array( $aResults ) && isset( $aResults[ 'data' ][ 'data' ] ) ) {
				$aMembers = array_map(
					function ( $aMember ) {
						return ( new MemberVO() )->applyFromArray( $aMember );
					},
					$aResults[ 'data' ][ 'data' ]
				);
				$aAllMembers = array_merge( $aAllMembers, $aMembers );
				$nOffset++;
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
		return $this->setLists( [ $nListId ] );
	}

	/**
	 * @param array $aLists
	 * @return $this
	 */
	public function setLists( $aLists ) {
		return $this->setRequestDataItem( 'listids', $aLists );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'list/display';
	}
}