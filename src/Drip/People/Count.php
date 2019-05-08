<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

/**
 * Class Count
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 */
class Count extends Base {

	use RetrievePageConsumer;
	const REQUEST_METHOD = 'get';

	/**
	 * https://developer.drip.com/?list-all-subscribers#list-all-subscribers
	 * @return int
	 */
	public function count() {
		$oPager = clone $this->getPageRetriever();
		$oPager->retrieve( 1, 1 );

		if ( $oPager->isLastRequestSuccess() ) {
			$nCount = $oPager->getDecodedResponseBody()[ 'meta' ][ 'total_count' ];
		}
		else {
			$nCount = 0;
		}
		return $nCount;
	}
}