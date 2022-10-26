<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
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

	public function asVo() :?PeopleVO {
		$oMember = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$aRes = $this->getDecodedResponseBody();
			if ( !empty( $aRes[ static::ENDPOINT_KEY ][ 0 ] ) ) {
				$oMember = $this->getVO()->applyFromArray( $aRes[ static::ENDPOINT_KEY ][ 0 ] );
			}
		}
		return $oMember;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', parent::getUrlEndpoint(), $this->getSubId() );
	}
}