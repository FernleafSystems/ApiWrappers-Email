<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Campaigns;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Campaigns
 */
class Retrieve extends Base {

	use CampaignAction;

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sId
	 * @return CampaignVO|null
	 */
	public function byId( $sId ) {
		return $this->setCampaignId( $sId )
					->asVo();
	}

	public function asVo() :?CampaignVO {
		$oMember = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aRes = $this->getDecodedResponseBody();
			if ( is_array( $aRes ) && !empty( $aRes[ static::ENDPOINT_KEY ][ 0 ] ) ) {
				$oMember = $this->getVO()->applyFromArray( $aRes[ static::ENDPOINT_KEY ][ 0 ] );
			}
		}
		return $oMember;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getCampaignId() );
	}
}