<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Contacts;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Users
 * @property string id
 * @property string cdate
 * @property string email
 * @property string firstName
 * @property string lastName
 * @property array  meta
 */
class ContactVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->cdate );
	}
}