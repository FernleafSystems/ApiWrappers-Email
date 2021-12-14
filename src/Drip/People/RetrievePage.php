<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class RetrievePage extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param int $page
	 * @param int $perPage
	 * @return PeopleVO[]
	 */
	public function retrieve( $page, $perPage ) {
		$aMembers = [];

		$aResp = $this->setRequestDataItem( 'page', $page )
					  ->setRequestDataItem( 'per_page', $perPage )
					  ->req()
					  ->getDecodedResponseBody();

		if ( !empty( $aResp[ static::ENDPOINT_KEY ] ) && is_array( $aResp[ static::ENDPOINT_KEY ] ) ) {
			$aMembers = array_map(
				function ( $aMemberData ) {
					return $this->getVO()->applyFromArray( $aMemberData );
				},
				$aResp[ static::ENDPOINT_KEY ]
			);
		}

		return $aMembers;
	}
}