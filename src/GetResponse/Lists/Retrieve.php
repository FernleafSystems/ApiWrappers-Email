<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Lists;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Lists
 * @property string $id
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
		$this->id = $sId;
		$this->req();
		if ( $this->isLastRequestSuccess() ) {
			$oVo = $this->getVO()->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oVo;
	}

	protected function getVO() :ListVO {
		return new ListVO();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() :string {
		$sId = $this->id;
		$sEndPoint = parent::getUrlEndpoint();
		return empty( $sId ) ? $sEndPoint : $sEndPoint.'/'.$sId;
	}
}