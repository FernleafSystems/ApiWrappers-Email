<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class MemberVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Users
 */
class MemberVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getCreatedAt() {
		return $this->getStringParam( 'created_at' );
	}

	/**
	 * @param string $sFieldId
	 * @return mixed|null
	 */
	public function getCustomField( $sFieldId ) {
		$aFields = $this->getCustomFields();
		return isset( $aFields[ $sFieldId ] ) ? $aFields[ $sFieldId ] : null;
	}

	/**
	 * @return array
	 */
	public function getCustomFields() {
		return $this->getArrayParam( 'custom_fields' );
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
		return $this->getStringParam( 'id' );
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}

	/**
	 * @return array
	 */
	public function getTags() {
		return $this->getArrayParam( 'tags' );
	}

	/**
	 * @param string $sTag
	 * @param bool   $bCaseSensitive
	 * @return bool
	 */
	public function hasTag( $sTag, $bCaseSensitive = true ) {
		return in_array(
			$bCaseSensitive ? $sTag : strtolower( $sTag ),
			$bCaseSensitive ? $this->getTags() : array_map( 'strtolower', $this->getTags() )
		);
	}
}