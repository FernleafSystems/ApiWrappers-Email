<?php

namespace FernleafSystems\Apis\Email\SendInBlue\Users;

class Exists extends Retrieve {

	/**
	 * TODO: this needs done right. It's make-believe
	 * @return bool
	 */
	public function exists() {
		$aResult = parent::send();
		return !empty( $aResult );
	}
}