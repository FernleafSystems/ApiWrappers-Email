<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class Retrieve extends Base {

	use SubscriberAction;
	const REQUEST_METHOD = 'get';

	/**
	 * @param string $email
	 * @return PeopleVO|null
	 */
	public function byEmail( $email ) {
		return $this->setEmail( $email )
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