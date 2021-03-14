<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes;

use FernleafSystems\ApiWrappers\Email\SendInBlue\Api;

/**
 * Class Delete
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Attributes
 */
class Delete extends Api {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param string $sName
	 * @return AttributeVO|null
	 */
	public function delete( $sName ) {
		$oAttr = ( new Retrieve() )
			->setConnection( $this->getConnection() )
			->byName( $sName );

		if ( !empty( $oAttr ) ) {
			try {
				$this->setAttr( $oAttr )
					 ->send();
			}
			catch ( \Exception $oE ) {
			}
		}
		return $oAttr;
	}

	/**
	 * @param AttributeVO $oAttr
	 * @return $this
	 */
	protected function setAttr( $oAttr ) {
		$this->attribute = $oAttr;
		return $this;
	}

	protected function getUrlEndpoint() :string {
		/** @var AttributeVO $oAttr */
		$oAttr = $this->attribute;
		return sprintf( 'contacts/attributes/%s/%s',
			rawurlencode( $oAttr->category ),
			rawurlencode( $oAttr->name )
		);
	}
}