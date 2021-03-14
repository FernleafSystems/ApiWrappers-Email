<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class PeopleIterator
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
class PeopleIterator extends \FernleafSystems\ApiWrappers\Email\Drip\Common\CommonIterator {

	use ConnectionConsumer,
		RetrievePageConsumer;

	/**
	 * @return PeopleVO|mixed
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
	 * @param int $pageNumber
	 * @return PeopleVO[]
	 */
	public function getPage( $pageNumber ) {
		return ( clone $this->getPageRetriever() )
			->setConnection( $this->getConnection() )
			->retrieve( $pageNumber + 1, $this->getPageSize() );
	}
}