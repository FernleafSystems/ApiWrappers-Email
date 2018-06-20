<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

class SubscribeToLists extends Update {

	/**
	 * @param int $nListId
	 * @return $this
	 */
	public function setList( $nListId ) {
		return $this->setLists( [ $nListId ] );
	}

	/**
	 * @param array $aLists
	 * @return $this
	 */
	public function setLists( $aLists ) {
		return $this->setRequestDataItem( 'listIds', $aLists );
	}
}