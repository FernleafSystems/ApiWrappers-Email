<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class ListVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Lists
 */
class ListVO extends BaseVO {

	/**
	 * @return int
	 */
	public function getId() {
		return $this->getParam( 'id' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}

	/**
	 * @return int
	 */
	public function getTotalSubscribers() {
		return $this->getParam( 'totalSubscribers' );
	}

	/**
	 * @return int
	 */
	public function getFolderId() {
		return $this->getParam( 'folderId' );
	}
}