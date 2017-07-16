<?php

namespace FernleafSystems\Apis\Email\Mailchimp\Lists\Members;

/**
 * Class Update
 * @package FernleafSystems\Apis\Email\Mailchimp\Lists\Members
 */
class Update extends Retrieve {

	/**
	 * @param array $aMergeFields
	 * @return $this
	 */
	public function setMergeFields( $aMergeFields ) {
		return $this->setRequestDataItem( 'merge_fields', $aMergeFields );
	}

	/**
	 * @return string
	 */
	protected function getVerb() {
		return 'patch';
	}
}