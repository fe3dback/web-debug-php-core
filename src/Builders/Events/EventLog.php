<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#log
 */
class EventLog extends AbstractEvent
{
    /**
     * full log text.
     *
     * @var string
     */
    private $message;

    /**
     * additional log context.
     *
     * @var array|null
     */
    private $context;

    /**
     * EventLog constructor.
     *
     * @param string $message full log text
     */
    public function __construct(string $message)
    {
        parent::__construct(self::EVENT_TYPE_LOG);

        $this->setMessage($message);
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'message' => $this->getMessage(),
            'context' => null !== $this->getContext() ? (string) json_encode($this->getContext()) : null,
        ]);
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array|null
     */
    public function getContext(): ?array
    {
        return $this->context;
    }

    /**
     * @param array|null $context
     */
    public function setContext(?array $context): void
    {
        $this->context = $context;
    }
}
