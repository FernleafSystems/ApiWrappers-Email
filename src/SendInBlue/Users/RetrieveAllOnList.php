<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

use FernleafSystems\Apis\Email\SendInBlue\Api;

class RetrieveAllOnList extends Api {

	public function retrieve() {

		$aAllMembers = array();

		$nOffset = 0;
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