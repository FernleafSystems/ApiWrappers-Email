<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Actions;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;
use FernleafSystems\ApiWrappers\Email\Drip;
use FernleafSystems\ApiWrappers\Email\Mailchimp\Lists\Members;
use FernleafSystems\ApiWrappers\Email\SendInBlue;

/**
 * Class Clean
 * @package FernleafSystems\ApiWrappers\Email\Common\Data
 */
abstract class Clean {

	const DEFAULT_FIRST_NAME_KEY = '';
	const DEFAULT_LAST_NAME_KEY = '';
	use ConnectionConsumer;

	/**
	 * @var mixed
	 */
	protected $oContact;

	/**
	 * @var string
	 */
	protected $sFirstNameKey;

	/**
	 * @var string
	 */
	protected $sLastNameKey;

	/**
	 * @param mixed|Drip\People\PeopleVO|Members\MemberVO|SendInBlue\Users\MemberVO $oContact
	 * @return mixed|Drip\People\PeopleVO|Members\MemberVO|SendInBlue\Users\MemberVO
	 */
	abstract public function names( $oContact );

	/**
	 * @return string
	 */
	public function getFirstNameKey() {
		return empty( $this->sFirstNameKey ) ? static::DEFAULT_FIRST_NAME_KEY : $this->sFirstNameKey;
	}

	/**
	 * @return string
	 */
	public function getLastNameKey() {
		return empty( $this->sLastNameKey ) ? static::DEFAULT_LAST_NAME_KEY : $this->sLastNameKey;
	}

	/**
	 * @param string $sLastNameKey
	 * @return $this
	 */
	public function setLastNameKey( $sLastNameKey ) {
		$this->oContact = $sLastNameKey;
		return $this;
	}

	/**
	 * @param string $sFirstNameKey
	 * @return $this
	 */
	public function setFirstNameKey( $sFirstNameKey ) {
		$this->sFirstNameKey = $sFirstNameKey;
		return $this;
	}
}