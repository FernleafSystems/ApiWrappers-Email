<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class RetrievePage
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class RetrievePage extends Base {

	use FilterConsumer;
	const REQUEST_METHOD = 'get';

	/**
	 * @param int $nOffset
	 * @param int $nPageLimit
	 * @return ContactVO[]
	 */
	public function retrieve( $nOffset, $nPageLimit ) {
		$aMembers = [];
		try {
			$aResults = $this->setRequestDataItem( 'offset', $nOffset )
							 ->setRequestDataItem( 'limit', $nPageLimit )
							 ->send()
							 ->getDecodedResponseBody();

			$sKey = static::ENDPOINT_KEY.'s';
			if ( is_array( $aResults ) && isset( $aResults[ $sKey ] ) ) {
				$aMembers = array_map(
					function ( $aMember ) {
						return $this->getVO()->applyFromArray( $aMember );
					},
					$aResults[ $sKey ]
				);
			}
		}
		catch ( \Exception $oE ) {
		}

		return $aMembers;
	}

	protected function getUrlEndpoint() :string {
		$nListId = $this->list_id;
		return is_numeric( $nListId ) ? sprintf( 'contacts/lists/%s/contacts', $nListId ) : 'contacts';
	}
}