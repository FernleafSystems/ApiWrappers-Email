<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 */
class Tag extends Base {

	use Updater;
	const REQUEST_METHOD = 'post';

	/**
	 * @param string $sTag
	 * @return $this
	 * @throws \Exception
	 */
	public function addTag( $sTag ) {
		$oTag = ( new GetResponse\Tags\Retrieve() )
			->setConnection( $this->getConnection() )
			->findTag( $sTag );
		if ( empty( $oTag ) ) {
			throw new \Exception( 'Tag does not exist by ID or by name' );
		}
		return $this->addTagById( $oTag->tagId );
	}

	/**
	 * @param string $sTag
	 * @return $this
	 * @throws \Exception
	 */
	public function removeTag( $sTag ) {
		$oTag = ( new GetResponse\Tags\Retrieve() )
			->setConnection( $this->getConnection() )
			->findTag( $sTag );
		if ( empty( $oTag ) ) {
			throw new \Exception( 'Tag does not exist by ID or by name' );
		}
		return $this->removeTagById( $oTag->tagId );
	}

	/**
	 * @param string $sTag
	 * @return $this
	 * @throws \Exception
	 */
	public function addTagById( $sTag ) {
		$aTags = $this->getCurrentContact()->getTagIds();
		$aTags[] = $sTag;
		return $this->setTagIds( $aTags );
	}

	/**
	 * @param string $sTagToRemove
	 * @return $this
	 * @throws \Exception
	 */
	public function removeTagById( $sTagToRemove ) {
		$aTags = $this->getCurrentContact()->getTagIds();
		if ( in_array( $sTagToRemove, $aTags ) ) {
			unset( $aTags[ array_search( $sTagToRemove, $aTags ) ] );
			$this->setTagIds( $aTags );
		}
		return $this;
	}

	/**
	 * @param string[] $aTags
	 * @return $this
	 */
	protected function setTagIds( $aTags ) {
		$aFinalTags = [];
		foreach ( array_unique( $aTags ) as $sTag ) {
			$aFinalTags[] = [ 'tagId' => $sTag ];
		}
		return $this->setRequestDataItem( 'tags', $aFinalTags );
	}
}