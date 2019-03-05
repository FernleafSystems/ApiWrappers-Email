<?php

namespace FernleafSystems\ApiWrappers\Email\ActiveCampaign\Tags;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Email\ActiveCampaign\Users
 * @property string id
 * @property string tagType
 * @property string tag - the name of the tag
 * @property string description
 * @property string subscriber_count
 * @property string cdate
 * @property array  links
 */
class TagVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->cdate );
	}
}