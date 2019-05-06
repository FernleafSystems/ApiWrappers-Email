<?php

namespace FernleafSystems\ApiWrappers\Email\Drip;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Email\Drip
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	const API_URL = 'https://api.getdrip.com/v%s';
	const API_VERSION = 2;

	/**
	 * @return string
	 */
	public function getBaseUrlWithAccountId() {
		return parent::getBaseUrl().'/'.$this->account_id;
	}
}