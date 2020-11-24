<?php

namespace FernleafSystems\ApiWrappers\Email\Postmark\Transactional;

/**
 * Class EmailVO
 * @package FernleafSystems\ApiWrappers\Email\Postmark\Transactional
 * @property string $stream
 */
class EmailVO extends \FernleafSystems\ApiWrappers\Email\Common\Transactional\EmailVO {

	public const TRACK_LINKS_NONE = 'None';
	public const TRACK_LINKS_BOTH = 'HtmlAndText';
	public const TRACK_LINKS_HTML = 'HtmlOnly';
	public const TRACK_LINKS_TEXT = 'TextOnly';

	public function getTrackLinks() :string {
		if ( isset( $this->track_links ) && $this->track_links !== false ) {
			if ( $this->track_links === true ) {
				$trk = self::TRACK_LINKS_BOTH;
			}
			else {
				$trk = $this->track_links;
			}
		}
		else {
			$trk = self::TRACK_LINKS_NONE;
		}
		return $trk;
	}
}