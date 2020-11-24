<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Email\Postmark\Transactional;

use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;
use FernleafSystems\ApiWrappers\Email\Postmark\Connection;
use Postmark\Models\PostmarkException;
use Postmark\PostmarkClient;

class SendEmail {

	use ConnectionConsumer;

	public function send( EmailVO $email ) :?string {
		/** @var Connection $conn */
		$conn = $this->getConnection();

		$msgID = null;

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
				$email->track_links ?? true,
				null, // Metadata array
				$email->stream ?? 'outbound'
			);
			$msgID = $res->MessageID;
		}
		catch ( PostmarkException $pe ) {
			error_log( $pe->httpStatusCode );
			error_log( $pe->message );
			error_log( $pe->postmarkApiErrorCode );
		}
		catch ( \Exception $e ) {
			error_log( $e->getMessage() );
		}
		return $msgID;
	}
}