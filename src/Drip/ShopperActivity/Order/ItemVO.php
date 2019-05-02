<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\ShopperActivity\Order;

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
class ItemVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {
}