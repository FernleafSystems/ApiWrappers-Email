<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class Exists extends Base {

	public function byEmail( string $email ) :bool {
		return ( new Retrieve() )
				   ->setConnection( $this->getConnection() )
				   ->byEmail( $email ) instanceof PeopleVO;
	}
}