<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Tags;

/**
 * Class TagCollectionVO
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Tags
 * @property TagVO[] tags
 */
class TagCollectionVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @param string $sNameOrId
	 * @return TagVO|null
	 */
	public function getTag( $sNameOrId ) {
		$oTheTag = null;
		foreach ( $this->tags as $oTag ) {
			if ( in_array( $sNameOrId, [ $oTag->name, $oTag->tagId ] ) ) {
				$oTheTag = $oTag;
				break;
			}
		}
		return $oTheTag;
	}

	/**
	 * @param string $sNameOrId
	 * @return bool
	 */
	public function hasTag( $sNameOrId ) {
		return !is_null( $this->getTag( $sNameOrId ) );
	}

	/**
	 * @param array[]
	 */
	public function setFromRawTags( $aRawTagsData ) {
		$this->tags = array_map(
			function ( $aTag ) {
				return ( new TagVO() )->applyFromArray( $aTag );
			},
			$aRawTagsData
		);
	}
}