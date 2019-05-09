<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Accounts;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Accounts
 * @property string $id
 * @property string $name
 * @property string $default_from_name
 * @property string $default_from_email
 * @property string $primary_email
 * @property string $default_postal_address
 * @property string $url
 * @property string $created_at
 */
class AccountVO extends BaseVO {

	/**
	 * @return string
	 * @deprecated
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getName() {
		return $this->id;
	}

	/**
	 * @param bool $bAsUnixTimestamp
	 * @return false|int|string
	 */
	public function getCreatedAt( $bAsUnixTimestamp ) {
		$sCreatedAt = $this->created_at;
		return ( !empty( $sCreatedAt ) && $bAsUnixTimestamp ) ? strtotime( $sCreatedAt ) : $sCreatedAt;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getDefaultFromName() {
		return $this->default_from_name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getDefaultFromEmail() {
		return $this->default_from_email;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getDefaultFromPostalAddress() {
		return $this->default_postal_address;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getPrimaryEmail() {
		return $this->primary_email;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getUrl() {
		return $this->url;
	}
}