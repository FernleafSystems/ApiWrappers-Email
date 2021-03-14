<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * Class AttributeVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes
 * @property string $category
 * @property string $name
 * @property string $type
 * @property array  $enumeration
 */
class AttributeVO {

	use DynProperties;

	/**
	 * @return bool
	 */
	public function isType_Category() {
		return $this->type == 'category';
	}

	/**
	 * @return bool
	 */
	public function isType_Date() {
		return $this->type == 'date';
	}

	/**
	 * @return bool
	 */
	public function isType_Float() {
		return $this->type == 'float';
	}

	/**
	 * @return bool
	 */
	public function isType_Id() {
		return $this->type == 'id';
	}

	/**
	 * @return bool
	 */
	public function isType_Text() {
		return $this->type == 'text';
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return array
	 * @deprecated
	 */
	public function getEnumeration() {
		return $this->enumeration;
	}
}