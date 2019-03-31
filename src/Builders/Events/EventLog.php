<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * Class EventLog.
 *
 * @property string     $message full log text
 * @property array|null $context additional log context
 *
 * @see https://web-debug.dev/docs/scheme/events.html#log
 */
class EventLog extends AbstractEvent
{
    /**
     * EventLog constructor.
     *
     * @param string $message full log text
     */
    public function __construct(string $message)
    {
        parent::__construct(self::EVENT_TYPE_LOG);

        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'message' => $this->message,
            'context' => $this->context ? (string) json_encode($this->context) : null,
        ]);
    }
}
