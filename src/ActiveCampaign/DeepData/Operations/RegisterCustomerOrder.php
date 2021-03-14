<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Operations;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;
use FernleafSystems\ApiWrappers\Email\ActiveCampaign\Connection;
use FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData;
use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * Class RegisterCustomerOrder
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Operations
 * @property string                            $serviceidentifier
 * @property DeepData\Connections\ConnectionVO $service
 * @property string                            $email
 * @property string                            $customerExternalId
 * @property DeepData\Orders\OrderVO           $order
 */
class RegisterCustomerOrder {

	use ConnectionConsumer;
	use DynProperties;

	/**
	 * @throws \Exception
	 */
	public function run() {
		$this->verifyDataReady(); // some basic sanity checking before we even start

		$oCon = $this->getConnection();

		{// Retrieve the Service Connection
			$this->service = ( new DeepData\Connections\Retrieve() )
				->setConnection( $oCon )
				->byService( $this->serviceidentifier );
			if ( empty( $this->service ) ) {
				throw new \Exception( sprintf( 'Service %s could not be loaded', $this->serviceidentifier ) );
			}
		}

		{// Find already existing customer or create it.
			$oApi = ( new DeepData\Customers\Retrieve() )->setConnection( $oCon );
			$oCustomer = $oApi->byEmailOnServiceConnection( $this->email, $this->service );

			if ( empty( $oCustomer ) ) {
				$oApi = ( new DeepData\Customers\Create() )
					->setConnection( $oCon )
					->setEmail( $this->email )
					->setExternalId( $this->customerExternalId )
					->setConnectionId( $this->service->id );
				$oCustomer = $oApi->create();
			}
			if ( !$oCustomer instanceof DeepData\Customers\CustomerVO ) {
				throw new \Exception( sprintf( 'Customer %s could not be loaded or created', $this->email ) );
			}
		}

		$oOrd = $this->order;

		{// Create Order if it doesn't already exist
			$aOrders = ( new DeepData\Orders\Find() )
				->setConnection( $oCon )
				->filterByServiceConnectionId( $this->service->id )
				->filterByEmail( $oCustomer->email )
				->filterByExternalId( $oOrd->externalid )
				->run();
			$oOrder = array_shift( $aOrders );

			if ( empty( $oOrder ) ) {
				$oOrd->source = '1';
				$oApi = ( new DeepData\Orders\Create() )
					->setConnection( $oCon )
					->setConnectionId( $this->service->id )
					->setEmail( $oCustomer->email )
					->setCustomerId( $oCustomer->id )
					->setSource( $oOrd->source )
					->setExternalId( $oOrd->externalid )
					->setTotalPrice( $oOrd->totalPrice )
					->setCurrency( $oOrd->currency )
					->setOrderUrl( $oOrd->orderUrl )
					->setOrderDate( $oOrd->orderDate )
					->setOrderNumber( empty( $oOrd->orderNumber ) ? $oOrd->externalid : $oOrd->orderNumber )
					->setOrderProducts( $oOrd->ecomOrderProducts );
				$oOrder = $oApi->create();
				if ( !$oOrder instanceof DeepData\Orders\OrderVO ) {
					throw new \Exception( sprintf( 'Order %s could not be loaded or created', $this->email ) );
				}
			}
		}

		return $oOrder;
	}

	/**
	 * @throws \Exception
	 */
	private function verifyDataReady() {
		if ( !$this->getConnection() instanceof Connection ) {
			throw new \Exception( 'No valid API Connection provided' );
		}
		if ( empty( $this->serviceidentifier ) ) {
			throw new \Exception( 'No service connection identifier provided' );
		}
		if ( empty( $this->email ) ) {
			throw new \Exception( 'No email address provided' );
		}
		if ( empty( $this->customerExternalId ) ) {
			throw new \Exception( 'No external customer ID provided' );
		}
		if ( !$this->order instanceof DeepData\Orders\OrderVO ) {
			throw new \Exception( 'No OrderVO provided' );
		}
		if ( empty( $this->order->ecomOrderProducts ) ) {
			throw new \Exception( 'No Order products provided' );
		}

		$aOrderKeys = [
			'externalid',
			'totalPrice',
			'currency',
			'orderUrl',
			'orderDate',
		];
		foreach ( $aOrderKeys as $sKey ) {
			if ( !isset( $this->order->{$sKey} ) ) {
				throw new \Exception( sprintf( 'No Order "%s" provided', $sKey ) );
			}
		}
	}
}
