<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class RetrieveAll
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class RetrievePage extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param int $nPage
	 * @param int $nPerPage
	 * @return PeopleVO[]
	 */
	public function retrieve( $nPage, $nPerPage ) {
		$aMembers = [];

		$aResp = $this->setRequestDataItem( 'page', $nPage )
					  ->setRequestDataItem( 'per_page', $nPerPage )
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