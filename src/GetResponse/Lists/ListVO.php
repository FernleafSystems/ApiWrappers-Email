<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Lists;

/**
 * Class ListVO
 * @see     https://apidocs.getresponse.com/v3/resources/campaigns#campaigns.get
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 * @property string campaignId
 * @property string href
 * @property string name
 * @property string languageCode
 */
class ListVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	public function isValid() :bool {
		return parent::isValid() && !empty( $this->campaignId );
	}
}