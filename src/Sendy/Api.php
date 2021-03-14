<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\Email\Sendy
 */
class Api extends BaseApi {

	const LIST_ID_KEY = 'list_id';

	public function getRequestDataFinal() :array {
		$aData = parent::getRequestDataFinal();
		$aData[ 'api_key' ] = $this->getConnection()->api_key;
		return $aData;
	}

	public function getRequestHeaders() :array {
		return $this->request_headers;
	}

	public function getDataChannel() :string {
		return 'form_params';
	}

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setListId( $nId ) {
		return $this->setRequestDataItem( static::LIST_ID_KEY, $nId );
	}
}