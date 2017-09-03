<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\ApiWrappers\Email\Mailchimp\Api;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Lists
 */
class RetrieveAll extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * TODO: Test
	 * @return ListVO[]
	 */
	public function retrieve() {

		$aAllLists = array();

		$nOffset = 0;
		do {
			$aLists = null;
			$aResults = $this->setRequestDataItem( 'page', $nOffset )
							 ->setRequestDataItem( 'page_limit', 100 )
							 ->send()
							 ->getDecodedResponseBody();

			if ( is_array( $aResults ) && isset( $aResults[ 'data' ] ) ) {
				$aLists = array_map(
					function( $aMember ) {
						return ( new ListVO() )->applyFromArray( $aMember );
					},
					$aResults[ 'data' ]
				);
				$aAllLists = array_merge( $aAllLists, $aLists );
				$nOffset++;
				continue;
			}

		} while ( !empty( $aLists ) );

		return $aAllLists;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'list' );
	}
}
