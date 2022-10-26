<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * @deprecated not required; use PeopleIterator instead
 */
class RetrieveAll extends Base {

	const REQUEST_METHOD = 'get';

	/**
	 * @return PeopleVO[]
	 */
	public function retrieve() {
		$aAllMembers = [];

		$oPit = new PeopleIterator();
		$oPit->setConnection( $this->getConnection() );
		foreach ( $oPit as $oP ) {
			$aAllMembers[] = $oP;
		}
		return $aAllMembers;
	}
}