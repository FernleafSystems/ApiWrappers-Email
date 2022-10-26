<?php

namespace FernleafSystems\ApiWrappers\Email\Sendy;

use FernleafSystems\ApiWrappers\Base\BaseApi;

class Api extends BaseApi {

	const LIST_ID_KEY = 'list_id';

	public function getRequestDataFinal() :array {
		$aData = parent::getRequestDataFinal();
		$aData[ 'api_key' ] = $this->getConnection()->api_key;
		return $aData;
	}

	public function getRequestHeaders() :array {
		return is_array( $this->request_headers ) ? $this->request_headers : [];
	}

	public function getDataChannel() :string {
		return 'form_params';
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public function setListId( $id ) {
		return $this->setRequestDataItem( static::LIST_ID_KEY, $id );
	}
}