<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class ListVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Lists
 * @property string id
 * @property string stringid
 * @property string name
 * @property string cdate
 */
class ListVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->cdate );
	}
}