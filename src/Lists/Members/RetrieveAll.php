<?php

namespace FernleafSystems\Apis\Email\Mailchimp\Lists\Members;

use FernleafSystems\Apis\Email\Mailchimp\BaseApi;

/**
 * Class RetrieveAll
 * @package FernleafSystems\Apis\Email\Mailchimp\Lists\Members
 */
class RetrieveAll extends BaseApi {

	const REQUEST_METHOD = 'get';

	/**
	 * @return MemberVO[]
	 */
	public function retrieve() {

		$aAllMembers = array();

		$nOffset = 0;
		do {
			$aMembers = null;
			$aResults = $this->setRequestDataItem( 'offset', $nOffset )
							 ->setRequestDataItem( 'count', 100 )
							 ->send();

			if ( is_array( $aResults ) && isset( $aResults[ 'members' ] ) ) {
				$aMembers = array_map(
					function( $aMember ) {
						return ( new MemberVO() )->applyFromArray( $aMember );
					},
					$aResults[ 'members' ]
				);
				$aAllMembers = array_merge( $aAllMembers, $aMembers );
				$nOffset++;
				continue;
			}

		} while ( !empty( $aMembers ) );

		return $aAllMembers;
	}

	/**
	 * @return string
	 */
	public function getListId() {
		return $this->getStringParam( 'list_id' );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setListId( $sId ) {
		return $this->setRawDataItem( 'list_id', $sId );
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return sprintf( 'lists/%s/members', $this->getListId() );
	}
}
