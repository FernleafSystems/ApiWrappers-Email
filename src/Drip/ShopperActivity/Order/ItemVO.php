<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity\Order;

use FernleafSystems\ApiWrappers\Base\BaseVO;
use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class ItemVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity\Order
 * @property string   product_id
 * @property string   product_variant_id
 * @property string   sku
 * @property string   name        - required
 * @property string   brand
 * @property string[] categories
 * @property float    price       - single product price
 * @property int      quantity
 * @property float    discount    - total given quantity
 * @property float    taxes       - total given quantity
 * @property float    fees        - total given quantity
 * @property float    shipping    - total given quantity
 * @property float    total       - total accounting for quantity, discounts, taxes, fees and shipping
 * @property string   product_url
 * @property string   image_url
 */
class ItemVO extends BaseVO {

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