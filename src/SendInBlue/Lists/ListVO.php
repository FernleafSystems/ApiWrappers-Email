<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Lists;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class ListVO
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Lists
 */
class ListVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}
}