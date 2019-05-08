<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class Update extends Create {

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setNewEmail( $sEmail ) {
		return $this->setRequestDataItem( 'new_email', $sEmail );
	}
}