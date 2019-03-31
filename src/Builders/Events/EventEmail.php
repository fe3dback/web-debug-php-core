<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeHtml;

/**
 * Class EventEmail.
 *
 * @property string   $subject     mail subject (title)
 * @property TypeHtml $body        email content (html or plain text)
 * @property string   $from        sender email address
 * @property string[] $to          to email addresses
 * @property string[] $cc          CC addresses
 * @property string[] $bcc         BCC addresses
 * @property string   $replyTo     reply-to target email address
 * @property string[] $attachments list of attachment file names (without actual content)
 *
 * @see https://web-debug.dev/docs/scheme/events.html#email
 */
class EventEmail extends AbstractEvent
{
    /**
     * EventEmail constructor.
     *
     * @param string   $subject
     * @param TypeHtml $body
     * @param string   $from
     * @param string[] $to
     */
    public function __construct(string $subject, TypeHtml $body, string $from, array $to)
    {
        parent::__construct(self::EVENT_TYPE_EMAIL);

        $this->subject = $subject;
        $this->body = $body;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'subject' => $this->subject,
            'body' => $this->body,
            'from' => $this->from,
            'to' => $this->to,
            'cc' => $this->cc,
            'bcc' => $this->bcc,
            'replyTo' => $this->replyTo,
            'attachments' => $this->attachments,
        ]);
    }
}
