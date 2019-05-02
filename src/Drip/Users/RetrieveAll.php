<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

/**
 * @deprecated not required; use PeopleIterator instead
 * Class RetrieveAll
 * @package    FernleafSystems\ApiWrappers\Email\Drip\Users
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