<?php

namespace FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members
 */
class RetrieveAll extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @return MemberVO[]
	 */
	public function retrieve() {

		$aAllMembers = [];

		$nOffset = 0;
		do {
			$aMembers = null;
			$aResults = $this->setRequestDataItem( 'offset', $nOffset )
							 ->setRequestDataItem( 'count', 100 )
							 ->req()
							 ->getDecodedResponseBody();

			if ( is_array( $aResults ) && isset( $aResults[ 'members' ] ) ) {
				$aMembers = array_map(
					function ( $aMember ) {
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
	protected function getUrlEndpoint() :string {
		return sprintf( 'lists/%s/members', $this->getListId() );
	}
}
