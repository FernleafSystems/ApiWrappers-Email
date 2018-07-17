<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

class RemoveFromList extends SubscribeToLists {

	/**
	 * @param array $aLists
	 * @return $this
	 */
	public function setLists( $aLists ) {
		return $this->setRequestDataItem( 'unlinkListIds', $aLists );
	}
}