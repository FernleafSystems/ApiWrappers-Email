<?php

namespace FernleafSystems\ApiWrappers\Email\ElasticEmail\Users;

class SubscribeToList extends Create {

	/**
	 * @param string $sPublicListId
	 * @return $this
	 */
	public function setListId( $sPublicListId ) {
		return $this->setRequestDataItem( 'publicListID', $sPublicListId );
	}
}