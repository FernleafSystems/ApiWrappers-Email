<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Tags;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Tags
 * @property string $id
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
		$VO = null;
		$this->id = $sId;
		$this->req();
		if ( $this->isLastRequestSuccess() ) {
			$VO = $this->getVO()->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $VO;
	}

	protected function getVO() :TagVO {
		return new TagVO();
	}

	protected function getUrlEndpoint() :string {
		return empty( $this->id ) ? parent::getUrlEndpoint() : parent::getUrlEndpoint().'/'.$this->id;
	}
}