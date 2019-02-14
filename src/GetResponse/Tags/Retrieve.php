<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Tags;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Tags
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sIdOrName
	 * @return TagVO|null
	 */
	public function findTag( $sIdOrName ) {
		$oTag = $this->byName( $sIdOrName );
		if ( empty( $oTag ) ) {
			$oTag = $this->setRequestData( [], false )
						 ->byId( $sIdOrName );
		}
		return $oTag;
	}

	/**
	 * @param string $sName
	 * @return TagVO|null
	 */
	public function byName( $sName ) {
		$oVo = null;

		$this->setRequestQueryDataItem( 'query[name]', $sName )->req();
		if ( $this->isLastRequestSuccess() ) {
			foreach ( $this->getDecodedResponseBody() as $aListInfo ) {
				if ( $aListInfo[ 'name' ] == $sName ) {
					$oVo = $this->getVO()->applyFromArray( $aListInfo );
					break;
				}
			}
		}
		return $oVo;
	}

	/**
	 * @param string $sId
	 * @return TagVO|null
	 */
	public function byId( $sId ) {
		$oVo = null;
		$this->setParam( 'id', $sId )->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = $this->getVO()->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oVo;
	}

	/**
	 * @return TagVO|null
	 */
	public function asVo() {
		return parent::asVo();
	}

	/**
	 * @return TagVO
	 */
	protected function getVO() {
		return new TagVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		$sId = $this->getParam( 'id' );
		$sEndPoint = parent::getUrlEndpoint();
		return empty( $sId ) ? $sEndPoint : $sEndPoint.'/'.$sId;
	}
}