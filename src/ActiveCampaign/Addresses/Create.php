<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Addresses
 */
class Create extends Base {

	/**
	 * @return AddressVO|null
	 */
	public function create() {
		$oContact = null;
		if ( $this->req()->isLastRequestSuccess() ) {
			$oContact = $this->getVO()
							 ->applyFromArray( $this->getDecodedResponseBody()[ static::ENDPOINT_KEY ] );
		}
		return $oContact;
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setCompanyName( $sName ) {
		return $this->setRequestDataItem( 'company_name', $sName );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setAddress1( $sValue ) {
		return $this->setRequestDataItem( 'address_1', $sValue );
	}

	/**
	 * @return array
	 */
	public function getRequestDataFinal() :array{
		return [ static::ENDPOINT_KEY => parent::getRequestDataFinal() ];
	}
}