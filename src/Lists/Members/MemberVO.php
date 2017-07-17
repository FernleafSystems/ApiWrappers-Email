<?php

namespace FernleafSystems\Apis\Email\Mailchimp\Lists\Members;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class MemberVO
 * @package FernleafSystems\Apis\Email\Mailchimp\Lists\Members
 */
class MemberVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email_address' );
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->getStringParam( 'id' );
	}

	/**
	 * @return array
	 */
	public function getMergeFields() {
		return $this->getArrayParam( 'merge_fields' );
	}

	/**
	 * @param string $sMergeFieldId
	 * @return mixed
	 */
	public function getMergeField( $sMergeFieldId ) {
		return $this->getMergeFields()[ strtoupper( $sMergeFieldId ) ];
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}
}