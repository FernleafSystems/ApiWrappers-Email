<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts
 */
class Count extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @return int
	 */
	public function count() {
		$nCount = 0;
		if ( $this->req()->isLastRequestSuccess() ) {
			$nCount = $this->getDecodedResponseBody()[ 'meta' ][ 'total' ];
		}
		return $nCount;
	}
}