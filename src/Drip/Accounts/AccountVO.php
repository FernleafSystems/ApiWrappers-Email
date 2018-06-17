<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 */
class AccountVO {

	use StdClassAdapter;

	/**
	 * @return array|null
	 */
	public function getAccountData() {
		return $this->hasAccounts() ? $this->getAccounts()[ 0 ] : null;
	}

	/**
	 * @return mixed|null
	 */
	public function getAccountDataItem( $sKey ) {
		$aD = $this->getAccountData();
		return ( is_array( $aD ) && isset( $aD[ $sKey ] ) ) ? $aD[ $sKey ] : null;
	}

	/**
	 * @return array
	 */
	public function getAccounts() {
		return $this->getArrayParam( 'accounts' );
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->getAccountDataItem( 'id' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getAccountDataItem( 'name' );
	}

	/**
	 * @return string|int|null
	 */
	public function getCreatedAt( $bAsUnixTimestamp ) {
		$sCreatedAt = $this->getAccountDataItem( 'created_at' );
		return ( !empty( $sCreatedAt ) && $bAsUnixTimestamp ) ? strtotime( $sCreatedAt ) : $sCreatedAt;
	}

	/**
	 * @return string
	 */
	public function getDefaultFromName() {
		return $this->getAccountDataItem( 'default_from_name' );
	}

	/**
	 * @return string
	 */
	public function getDefaultFromEmail() {
		return $this->getAccountDataItem( 'default_from_email' );
	}

	/**
	 * @return string
	 */
	public function getDefaultFromPostalAddress() {
		return $this->getAccountDataItem( 'default_postal_address' );
	}

	/**
	 * @return string
	 */
	public function getPrimaryEmail() {
		return $this->getAccountDataItem( 'primary_email' );
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->getAccountDataItem( 'url' );
	}

	/**
	 * @return bool
	 */
	public function hasAccounts() {
		return !empty( $this->getAccounts() );
	}
}