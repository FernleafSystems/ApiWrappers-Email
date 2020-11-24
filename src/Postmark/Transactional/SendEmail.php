<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Postmark\Transactional;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;
use FernleafSystems\ApiWrappers\Email\Common\Transactional\EmailSender;
use FernleafSystems\ApiWrappers\Email\Postmark\Connection;
use Postmark\Models\PostmarkException;
use Postmark\PostmarkClient;

class SendEmail {

	use ConnectionConsumer;
	use EmailSender;

	public function send() :?string {
		/** @var Connection $conn */
		$conn = $this->getConnection();

		$msgID = null;

		/** @var EmailVO $email */
		$email = $this->getEmailVO();
		try {
			$res = ( new PostmarkClient( $conn->api_key ) )->sendEmail(
				$email->from,
				$email->to,
				$email->subject,
				$email->html,
				$email->text,
				is_array( $email->tags ) ? array_shift( $email->tags ) : $email->tags,
				$email->track_opens ?? true,
				$email->reply_to, // Reply To
				$email->cc, // CC
				$email->bcc, // BCC
				null, // Header array
				null, // Attachment array
				$email->getTrackLinks(),
				null, // Metadata array
				$email->stream ?? 'outbound'
			);
			$msgID = $res->MessageID;
		}
		catch ( PostmarkException $pe ) {
			error_log( (string)$pe->httpStatusCode );
			error_log( (string)$pe->message );
			error_log( (string)$pe->postmarkApiErrorCode );
		}
		catch ( \Exception $e ) {
			error_log( $e->getMessage() );
		}

		return $msgID;
	}
}