<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\Users;

class Exists extends Base {

	public function byEmail( string $email ) :bool {
		$people = ( new Retrieve() )
			->setConnection( $this->getConnection() )
			->byEmail( $email );
		return $people instanceof PeopleVO;
	}
}