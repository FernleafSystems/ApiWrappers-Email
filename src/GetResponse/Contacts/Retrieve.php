<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sEmail
	 * @return ContactVO
	 */
	public function byEmail( $sEmail ) {
		return $this->setRequestQueryDataItem( 'query[email]', $sEmail )
					->asVo();
	}

	/**
	 * @param string $sId
	 * @return ContactVO
	 */
	public function byId( $sId ) {
		return $this->setParam( 'contactId', $sId )
					->asVo();
	}

	/**
	 * @return ContactVO|null
	 */
	public function asVo() {
		return parent::asVo();
	}

	/**
	 * @return ContactVO
	 */
	protected function getVO() {
		return new ContactVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		$sId = $this->getParam( 'contactId' );
		return empty( $sId ) ? parent::getUrlEndpoint() : 'contacts/'.$sId;
	}
}