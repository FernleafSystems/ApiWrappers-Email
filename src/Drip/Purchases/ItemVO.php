<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Purchases;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class ItemVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\Purchases
 */
class ItemVO {

	use StdClassAdapter;

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setName( $sValue ) {
		return $this->setParam( 'name', $sValue );
	}

	/**
	 * @param int $nAmount
	 * @return $this
	 */
	public function setAmount( $nAmount ) {
		return $this->setParam( 'amount', (int)round( $nAmount ) );
	}

	/**
	 * @param string $sId
	 * @return $this
	 */
	public function setProductId( $sId ) {
		return $this->setParam( 'product_id', $sId );
	}

	/**
	 * @param array $aProps - associative array
	 * @return $this
	 */
	public function setProperties( $aProps ) {
		return $this->setParam( 'properties', $aProps );
	}

	/**
	 * @param int $nQuantity
	 * @return $this
	 */
	public function setQuantity( $nQuantity ) {
		return $this->setParam( 'quantity', (int)$nQuantity );
	}

	/**
	 * @param string $sSku
	 * @return $this
	 */
	public function setSku( $sSku ) {
		return $this->setParam( 'sku', $sSku );
	}
}