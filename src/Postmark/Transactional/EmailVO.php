<?php

namespace FernleafSystems\ApiWrappers\Email\Postmark\Transactional;

/**
 * @property string $stream
 */
class EmailVO extends \FernleafSystems\ApiWrappers\Email\Common\Transactional\EmailVO {

	public const TRACK_LINKS_NONE = 'None';
	public const TRACK_LINKS_BOTH = 'HtmlAndText';
	public const TRACK_LINKS_HTML = 'HtmlOnly';
	public const TRACK_LINKS_TEXT = 'TextOnly';

	public function getTrackLinks() :string {
		$trk = null;

		if ( $this->track_links === false ) {
			$trk = self::TRACK_LINKS_NONE;
		}
		elseif ( !isset( $this->track_links ) || $this->track_links === true ) {
			$trk = self::TRACK_LINKS_BOTH;
		}
		else {
			try {
				if ( in_array( $this->track_links, ( new \ReflectionClass( $this ) )->getConstants() ) ) {
					$trk = $this->track_links;
				}
			}
			catch ( \ReflectionException $e ) {
			}
		}
		return empty( $trk ) ? self::TRACK_LINKS_BOTH : $trk;
	}
}