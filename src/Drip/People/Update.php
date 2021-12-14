<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class Update extends Create {

	/**
	 * @return $this
	 */
	public function setNewEmail( string $email ) {
		return $this->setRequestDataItem( 'new_email', $email );
	}
}