<?php

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class SubscriberVO
 * @package FernleafSystems\ApiWrappers\Email\Drip\People
 * @property string   $id
 * @property string   $email
 * @property string   $href
 * @property string   $status     - all, active, unsubscribed, active_or_unsubscribed or undeliverable
 * @property string   $time_zone
 * @property int      $utc_offset
 * @property string   $visitor_uuid
 * @property string[] $custom_fields
 * @property string[] $tags
 * @property string   $created_at - e.g. 2019-05-02T13:14:58Z
 * @property string   $ip_address
 * @property string   $user_agent
 * @property string   $lifetime_value
 * @property string   $original_referrer
 * @property string   $landing_url
 * @property string   $prospect
 * @property string   $base_lead_score
 * @property string   $eu_consent
 * @property string   $lead_score
 * @property string   $user_id
 * @property array    $links
 */
class PeopleVO extends BaseVO {

	/**
	 * @return string
	 */
	public function getCreatedAtTs() {
		return strtotime( $this->created_at );
	}

	/**
	 * This uses the default custom file key: first_name
	 * @return string
	 */
	public function getFirstName() {
		return $this->getCustomField( 'first_name' );
	}

	/**
	 * This uses the default custom file key: last_name
	 * @return string
	 */
	public function getLastName() {
		return $this->getCustomField( 'last_name' );
	}

	/**
	 * @param string $sTag
	 * @param bool   $bCaseSensitive
	 * @return bool
	 */
	public function hasTag( $sTag, $bCaseSensitive = true ) {
		return in_array(
			$bCaseSensitive ? $sTag : strtolower( $sTag ),
			$bCaseSensitive ? $this->tags : array_map( 'strtolower', $this->tags )
		);
	}

	/**
	 * @param string $sFieldId
	 * @return mixed|null
	 */
	public function getCustomField( $sFieldId ) {
		return isset( $this->custom_fields[ $sFieldId ] ) ? $this->custom_fields[ $sFieldId ] : null;
	}
}