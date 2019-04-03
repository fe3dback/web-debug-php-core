<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeHtml;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#email
 */
class EventEmail extends AbstractEvent
{
    /**
     * mail subject (title).
     *
     * @var string
     */
    private $subject;

    /**
     * email content (html or plain text).
     *
     * @var TypeHtml
     */
    private $body;

    /**
     * sender email address.
     *
     * @var string
     */
    private $from;

    /**
     * to email addresses.
     *
     * @var string[]
     */
    private $to;

    /**
     * CC addresses.
     *
     * @var string[]|null
     */
    private $cc;

    /**
     * BCC addresses.
     *
     * @var string[]|null
     */
    private $bcc;

    /**
     * reply-to target email address.
     *
     * @var string|null
     */
    private $replyTo;

    /**
     * list of attachment file names (without actual content).
     *
     * @var string[]|null
     */
    private $attachments;

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

        $this->setSubject($subject);
        $this->setBody($body);
        $this->setFrom($from);
        $this->setTo($to);
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'subject' => $this->getSubject(),
            'body' => $this->getBody(),
            'from' => $this->getFrom(),
            'to' => $this->getTo(),
            'cc' => $this->getCc(),
            'bcc' => $this->getBcc(),
            'replyTo' => $this->getReplyTo(),
            'attachments' => $this->getAttachments(),
        ]);
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return TypeHtml
     */
    public function getBody(): TypeHtml
    {
        return $this->body;
    }

    /**
     * @param TypeHtml $body
     */
    public function setBody(TypeHtml $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string[]
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @param string[] $to
     */
    public function setTo(array $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string[]|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    /**
     * @param string[]|null $cc
     */
    public function setCc(?array $cc): void
    {
        $this->cc = $cc;
    }

    /**
     * @return string[]|null
     */
    public function getBcc(): ?array
    {
        return $this->bcc;
    }

    /**
     * @param string[]|null $bcc
     */
    public function setBcc(?array $bcc): void
    {
        $this->bcc = $bcc;
    }

    /**
     * @return string|null
     */
    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }

    /**
     * @param string|null $replyTo
     */
    public function setReplyTo(?string $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return string[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param string[]|null $attachments
     */
    public function setAttachments(?array $attachments): void
    {
        $this->attachments = $attachments;
    }
}
