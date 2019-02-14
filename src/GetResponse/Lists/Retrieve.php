<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Lists;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Lists
 */
class Retrieve extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @param string $sName
	 * @return ListVO|null
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
	 * @return ListVO|null
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
	 * @return ListVO|null
	 */
	public function asVo() {
		return parent::asVo();
	}

	/**
	 * @return ListVO
	 */
	protected function getVO() {
		return new ListVO();
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