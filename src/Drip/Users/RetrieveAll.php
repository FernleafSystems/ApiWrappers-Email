<?php

namespace FernleafSystems\Apis\Email\Drip\Users;

use FernleafSystems\Apis\Email\Drip;

/**
 * Class RetrieveAll
 * @package FernleafSystems\Apis\Email\Drip\Users
 */
class RetrieveAll extends Drip\Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return MemberVO[]
	 */
	public function retrieve() {
		$aAllMembers = array();

		$nPage = 1;
		do {
			$aMembers = $this->setRequestDataItem( 'page', $nPage++ )
							 ->setRequestDataItem( 'per_page', 1000 )
							 ->send()
							 ->getDecodedResponseBody();

			$bHasResults = !empty( $aMembers[ 'subscribers' ] ) && is_array( $aMembers[ 'subscribers' ] );
			if ( $bHasResults ) {
				$aMembers = array_map(
					function ( $aMember ) {
						return ( new MemberVO() )->applyFromArray( $aMember );
					},
					$aMembers[ 'subscribers' ]
				);
				$aAllMembers = array_merge( $aAllMembers, $aMembers );
			}
		} while ( $bHasResults );

		return $aAllMembers;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}