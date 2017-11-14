<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
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
	 * @param string $sNewTag
	 * @return $this
	 */
	public function addTagToFilter( $sNewTag ) {
		$sTags = $this->getRequestDataItem( 'tags' );
		if ( is_null( $sTags ) || !is_string( $sTags ) ) {
			$sTags = '';
		}
		$aTags = explode( ',', $sTags );
		if ( !in_array( $sNewTag, $aTags ) ) {
			$aTags[] = $sNewTag;
		}
		return $this->setRequestDataItem( 'tags', implode( ',', $aTags ) );
	}

	/**
	 * @param string $sStatus
	 * @return $this
	 */
	public function filterByStatus( $sStatus ) {
		$sStatus = strtolower( $sStatus );
		if ( in_array( $sStatus, array( 'active', 'unsubscribed', 'undeliverable', 'all' ) ) ) {
			$this->setRequestDataItem( 'status', $sStatus );
		}
		return $this;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'subscribers';
	}
}