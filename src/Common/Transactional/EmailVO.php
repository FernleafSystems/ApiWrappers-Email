<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Transactional;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class EmailVO
 * @package FernleafSystems\ApiWrappers\Email\Common\Transactional
 * @property string       $to
 * @property string       $reply_to
 * @property string       $cc
 * @property string       $bcc
 * @property string       $from
 * @property string       $subject
 * @property string       $html
 * @property string       $text
 * @property array|string $tags
 * @property bool         $track_opens
 * @property bool         $track_links
 */
class EmailVO {

	use StdClassAdapter;
}