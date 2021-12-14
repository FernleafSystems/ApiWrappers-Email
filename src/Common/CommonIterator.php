<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Common;

use Elliotchance\Iterator\AbstractPagedIterator;
use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;
use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * @property int $page_size
 */
abstract class CommonIterator extends AbstractPagedIterator {

	use ConnectionConsumer;
	use DynProperties;

	public const PAGE_LIMIT = 50;

	/**
	 * @var int
	 */
	protected $nTotalSize;

	/**
	 * @inheritDoc
	 */
	public function getPageSize() {
		return empty( $this->page_size ) ? static::PAGE_LIMIT : $this->page_size;
	}

	public function rewind() {
		parent::rewind();
		unset( $this->nTotalSize );
	}
}