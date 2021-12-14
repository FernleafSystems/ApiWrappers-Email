<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip;

class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.getdrip.com/v%s';
	const API_VERSION = 2;

	public function getBaseUrlWithAccountId() :string {
		return parent::getBaseUrl().'/'.$this->account_id;
	}
}