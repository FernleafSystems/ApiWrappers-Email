<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
class Retrieve extends Base {

	use SubscriberAction;
	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return PeopleVO|null
	 */
	public function byEmail( $sEmail ) {
		return $this->setEmail( $sEmail )
					->asVo();
	}

	/**
	 * @return PeopleVO|null
	 */
	public function asVo() {
		$oMember = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aRes = $this->getDecodedResponseBody();
			if ( is_array( $aRes ) && !empty( $aRes[ static::ENDPOINT_KEY ][ 0 ] ) ) {
				$oMember = $this->getVO()->applyFromArray( $aRes[ static::ENDPOINT_KEY ][ 0 ] );
			}
		}
		return $oMember;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getSubId() );
	}
}