<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes
 */
class RetrieveAll extends Api {

	const REQUEST_METHOD = 'get';

	/**
	 * @return AttributeVO[]
	 */
	public function retrieve() {

		$aAll = [];

		$nOffset = 0;
		$nPageLimit = 50;
		do {
			$aResultItems = null;
			try {
				$aResults = $this->setRequestDataItem( 'offset', $nOffset )
								 ->setRequestDataItem( 'limit', $nPageLimit )
								 ->send()
								 ->getDecodedResponseBody();

				if ( is_array( $aResults ) && isset( $aResults[ 'attributes' ] ) ) {
					$aResultItems = array_map(
						function ( $aItem ) {
							return ( new AttributeVO() )->applyFromArray( $aItem );
						},
						$aResults[ 'attributes' ]
					);
					$aAll = array_merge( $aAll, $aResultItems );
					$nOffset += $nPageLimit;
					continue;
				}
			}
			catch ( \Exception $oE ) {
			}
		} while ( !empty( $aResultItems ) );

		return $aAll;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		return 'contacts/attributes';
	}
}