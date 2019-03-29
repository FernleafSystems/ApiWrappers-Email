<?php

namespace FernleafSystems\ApiWrappers\Email\Common;

use Elliotchance\Iterator\AbstractPagedIterator;
use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class CommonIterator
 * @package FernleafSystems\ApiWrappers\Email\Common
 */
abstract class CommonIterator extends AbstractPagedIterator {

	use ConnectionConsumer;
	const PAGE_LIMIT = 50;

	/**
	 * @var int
	 */
	protected $nTotalSize;

	/**
	 * @return int
	 */
	public function getPageSize() {
		return static::PAGE_LIMIT;
	}

	public function rewind() {
		parent::rewind();
		unset( $this->nTotalSize );
	}
}