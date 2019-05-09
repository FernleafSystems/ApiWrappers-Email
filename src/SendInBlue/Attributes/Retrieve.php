<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes
 */
class Retrieve {

	use ConnectionConsumer;

	/**
	 * @param string byName
	 * @return AttributeVO|null
	 */
	public function byName( $sName ) {

		$oRtr = ( new RetrieveAll() )->setConnection( $this->getConnection() );

		$oTheAttr = null;
		foreach ( $oRtr->retrieve() as $oAttr ) {
			if ( $sName == $oAttr->name ) {
				$oTheAttr = $oAttr;
			}
		}

		return $oTheAttr;
	}
}