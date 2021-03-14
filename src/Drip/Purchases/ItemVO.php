<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Purchases;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * Class ItemVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Purchases
 */
class ItemVO {

	use DynProperties;

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setName( $sValue ) {
		$this->name = $sValue;
		return $this;
	}

	/**
	 * @param int $nAmount
	 * @return $this
	 */
	public function setAmount( $nAmount ) {
		$this->amount = (int)round( $nAmount );
		return $this;
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setProductId( $sId ) {
		$this->product_id = $sId;
		return $this;
	}

	/**
	 * @param array $aProps - associative array
	 * @return $this
	 */
	public function setProperties( $aProps ) {
		$this->properties = $aProps;
		return $this;
	}

	/**
	 * @param int $nQuantity
	 * @return $this
	 */
	public function setQuantity( $nQuantity ) {
		$this->quantity = (int)$nQuantity;
		return $this;
	}

	/**
	 * @param string $sSku
	 * @return $this
	 */
	public function setSku( $sSku ) {
		$this->sku = $sSku;
		return $this;
	}
}