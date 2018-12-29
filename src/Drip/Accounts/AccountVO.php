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
	 * @return string
	 */
	public function getId() {
		return $this->getStringParam( 'id' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}

	/**
	 * @param bool $bAsUnixTimestamp
	 * @return false|int|string
	 */
	public function getCreatedAt( $bAsUnixTimestamp ) {
		$sCreatedAt = $this->getStringParam( 'created_at' );
		return ( !empty( $sCreatedAt ) && $bAsUnixTimestamp ) ? strtotime( $sCreatedAt ) : $sCreatedAt;
	}

	/**
	 * @return string
	 */
	public function getDefaultFromName() {
		return $this->getStringParam( 'default_from_name' );
	}

	/**
	 * @return string
	 */
	public function getDefaultFromEmail() {
		return $this->getStringParam( 'default_from_email' );
	}

	/**
	 * @return string
	 */
	public function getDefaultFromPostalAddress() {
		return $this->getStringParam( 'default_postal_address' );
	}

	/**
	 * @return string
	 */
	public function getPrimaryEmail() {
		return $this->getStringParam( 'primary_email' );
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->getStringParam( 'url' );
	}
}