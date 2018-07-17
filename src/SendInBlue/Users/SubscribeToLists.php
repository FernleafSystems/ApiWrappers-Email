<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

class SubscribeToLists extends Update {

	/**
	 * @param int $nListId - must be INT or the request fails.
	 * @return $this
	 */
	public function setList( $nListId ) {
		return $this->setLists( [ (int)$nListId ] );
	}

	/**
	 * @param array $aLists
	 * @return $this
	 */
	public function setLists( $aLists ) {
		return $this->setRequestDataItem( 'listIds', $aLists );
	}
}