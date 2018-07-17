<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class AttributeVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes
 */
class AttributeVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getCategory() {
		return $this->getStringParam( 'category' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->getStringParam( 'type' );
	}

	/**
	 * @return array
	 */
	public function getEnumeration() {
		return $this->getArrayParam( 'enumeration' );
	}

	/**
	 * @param string $sType
	 * @return bool
	 */
	public function isType( $sType ) {
		return $this->getType() == $sType;
	}

	/**
	 * @return bool
	 */
	public function isType_Category() {
		return $this->isType( 'category' );
	}

	/**
	 * @return bool
	 */
	public function isType_Date() {
		return $this->isType( 'date' );
	}

	/**
	 * @return bool
	 */
	public function isType_Float() {
		return $this->isType( 'float' );
	}

	/**
	 * @return bool
	 */
	public function isType_Id() {
		return $this->isType( 'id' );
	}

	/**
	 * @return bool
	 */
	public function isType_Text() {
		return $this->isType( 'text' );
	}
}