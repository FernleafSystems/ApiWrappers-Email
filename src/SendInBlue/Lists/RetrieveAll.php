<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Lists
 */
class RetrieveAll extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * TODO: retest as there are bugs in the pagination
	 * @return ListVO[]
	 */
	public function retrieve() {

		$aAllLists = array();

		$nOffset = 0;
		$nPageLimit = 50;
		do {
			$aLists = null;
			$aResults = $this->setRequestDataItem( 'offset', $nOffset )
							 ->setRequestDataItem( 'limit', $nPageLimit )
							 ->send()
							 ->getDecodedResponseBody();

			if ( is_array( $aResults ) && isset( $aResults[ 'lists' ] ) ) {
				$aLists = array_map(
					function ( $aList ) {
						return ( new ListVO() )->applyFromArray( $aList );
					},
					$aResults[ 'lists' ]
				);
				$aAllLists = array_merge( $aAllLists, $aLists );
				$nOffset += $nPageLimit;
				continue;
			}
		} while ( !empty( $aLists ) );

		return $aAllLists;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'contacts/lists' );
	}
}
