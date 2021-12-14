<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

class PeopleIterator extends \FernleafSystems\ApiWrappers\Email\Drip\Common\CommonIterator {

	use ConnectionConsumer;
	use RetrievePageConsumer;

	/**
	 * @return PeopleVO
	 */
	public function current() {
		return parent::current();
	}

	/**
	 * @return int
	 */
	public function getTotalSize() {
		if ( !isset( $this->nTotalSize ) ) {
			$this->nTotalSize = ( new Count() )
				->setConnection( $this->getConnection() )
				->setPageRetriever( $this->getPageRetriever() )
				->count();
		}
		return $this->nTotalSize;
	}

	/**
	 * @param int $page
	 * @return PeopleVO[]
	 */
	public function getPage( $page ) {
		return ( clone $this->getPageRetriever() )
			->setConnection( $this->getConnection() )
			->retrieve( $page + 1, $this->getPageSize() );
	}
}