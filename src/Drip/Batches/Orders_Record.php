<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Batches;

use FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Orders_Record
 * @package FernleafSystems\ApiWrappers\Email\Drip\Batches
 */
class Orders_Record extends Base {

	/**
	 * @param Drip\ShopperActivity\Order\OrderVO $oOrder
	 * @return $this
	 */
	public function addOrder( Drip\ShopperActivity\Order\OrderVO $oOrder ) {
		return $this->addOrderData( $oOrder->getRawData() );
	}

	/**
	 * @param array $aOrderData
	 * @return $this
	 */
	public function addOrderData( $aOrderData ) {
		$aSubs = $this->getRequestDataItem( 'orders' );
		if ( !is_array( $aSubs ) ) {
			$aSubs = [];
		}
		$aSubs[] = $aOrderData;
		return $this->setRequestDataItem( 'orders', $aSubs );
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '%s/%s', 'order', parent::getUrlEndpoint() );
	}
}