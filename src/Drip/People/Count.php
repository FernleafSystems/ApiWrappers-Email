<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

class Count extends Base {

	use RetrievePageConsumer;
	const REQUEST_METHOD = 'get';

	/**
	 * https://developer.drip.com/?list-all-subscribers#list-all-subscribers
	 */
	public function count() :int {
		$pager = clone $this->getPageRetriever();
		$pager->retrieve( 1, 1 );

		if ( $pager->isLastRequestSuccess() ) {
			$count = $pager->getDecodedResponseBody()[ 'meta' ][ 'total_count' ];
		}
		else {
			$count = 0;
		}
		return (int)$count;
	}
}