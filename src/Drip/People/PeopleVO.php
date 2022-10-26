<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Drip\People;

use FernleafSystems\ApiWrappers\Base\BaseVO;
use FernleafSystems\ApiWrappers\Email;

/**
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
 *
 * *** Custom Fields ***
 * @property string   $first_name
 * @property string   $last_name
 */
class PeopleVO extends BaseVO {

	public function __get( $key ) {
		return isset( $this->{$key} ) ? parent::__get( $key ) : $this->getCustomField( $key );
	}

	public function getCreatedAtTs() :int {
		return strtotime( $this->created_at );
	}

	/**
	 * This uses the default custom file key: first_name
	 * @return string
	 */
	public function getFirstName() :string {
		return (string)$this->first_name;
	}

	/**
	 * This uses the default custom file key: last_name
	 * @return string
	 */
	public function getLastName() :string {
		return (string)$this->last_name;
	}

	public function hasTag( string $tag, bool $caseSensitive = true ) :bool {
		return in_array(
			$caseSensitive ? $tag : strtolower( $tag ),
			$caseSensitive ? $this->tags : array_map( 'strtolower', $this->tags )
		);
	}

	public function getCustomField( string $field ) :?string {
		return $this->custom_fields[ $field ] ?? null;
	}

	/**
	 * @param string $field
	 * @param mixed  $value
	 * @return $this
	 */
	public function setCustomField( $field, $value ) {
		$cf = is_array( $this->custom_fields ) ? $this->custom_fields : [];
		$cf[ $field ] = $value;
		$this->custom_fields = $cf;
		return $this;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setFirstName( $name ) {
		return $this->setCustomField( 'first_name', $name );
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setLastName( $name ) {
		return $this->setCustomField( 'last_name', $name );
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName( $name ) {
		[ $first, $last ] = ( new Email\Common\Data\CleanNames() )->name( $name );
		return $this->setFirstName( $first )
					->setLastName( $last );
	}
}