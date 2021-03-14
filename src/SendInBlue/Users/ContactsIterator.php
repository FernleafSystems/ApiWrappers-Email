<?php

namespace FernleafSystems\ApiWrappers\Email\SendInBlue\Users;

/**
 * Class ContactsIterator
 * @package FernleafSystems\ApiWrappers\Email\SendInBlue\Users
 */
class ContactsIterator extends \FernleafSystems\ApiWrappers\Email\Common\CommonIterator {

	/**
	 * @var int
	 */
	private $nListId;

	/**
	 * @return MemberVO|mixed
	 */
	public function current() {
		return parent::current();
	}

	/**
	 * @return int
	 */
	public function getListId() {
		return $this->nListId;
	}

	/**
	 * @return int
	 */
	public function getTotalSize() {
		if ( !isset( $this->nTotalSize ) ) {
			$this->nTotalSize = ( new Count() )
				->setConnection( $this->getConnection() )
				->count( $this->getListId() );
		}
		return $this->nTotalSize;
	}

	/**
	 * @param int $pageNumber
	 * @return array|MemberVO[]
	 */
	public function getPage( $pageNumber ) {
		return ( new RetrievePage() )
			->setConnection( $this->getConnection() )
			->retrieve( $pageNumber*$this->getPageSize(), $this->getPageSize(), $this->getListId() );
	}

	/**
	 * @param int $nListId
	 * @return $this
	 */
	public function setListId( $nListId ) {
		$this->nListId = $nListId;
		return $this;
	}
}