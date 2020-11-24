<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Transactional;

trait EmailSender {

	/**
	 * @var EmailVO
	 */
	protected $emailVO;

	public function getEmailVO() :EmailVO {
		return $this->emailVO instanceof EmailVO ? $this->emailVO : new EmailVO();
	}

	public function setEmailVO( EmailVO $email ) :self {
		$this->emailVO = $email;
		return $this;
	}
}