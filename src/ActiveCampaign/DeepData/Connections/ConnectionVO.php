<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\DeepData\Connections;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Users
 * @property string id
 * @property int    isInternal     - i.e. 0/1
 * @property string name
 * @property string externalid
 * @property string service
 * @property string linkUrl
 * @property string logoUrl
 * @property string cdate
 * @property string udate
 * @property string connectionType - e.g. ecommerce
 */
class ConnectionVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->cdate );
	}
}