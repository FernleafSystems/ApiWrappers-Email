<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Contacts;

use FernleafSystems\ApiWrappers\Email\GetResponse;

/**
 * Class ContactOnListVO
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Contacts
 * @property string  contactId
 * @property string  href
 * @property string  name
 * @property string  email
 * @property string  note
 * @property string  origin
 * @property string  dayOfCycle
 * @property string  changedOn
 * @property string  timeZone
 * @property string  ipAddress
 * @property string  createdOn
 * @property array   campaign          (keys: campaignId, name, href)
 * @property array   customFieldValues (Full only)
 * @property array   geolocation       (Full only)
 * @property array[] tags              (Full only) - use getTags()
 */
class ContactOnListVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->createdOn );
	}

	/**
	 * @return string[]
	 */
	public function getTagIds() {
		return array_map(
			function ( $aTag ) {
				return $aTag[ 'tagId' ];
			},
			$this->tags
		);
	}
}