<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * Class EventMiddleware.
 *
 * @property string $name Middleware name
 *
 * @see https://web-debug.dev/docs/scheme/events.html#middleware
 */
class EventMiddleware extends AbstractEvent
{
    /**
     * EventMiddleware constructor.
     *
     * @param string $name Middleware name
     */
    public function __construct(string $name)
    {
        parent::__construct(self::EVENT_TYPE_MIDDLEWARE);

        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'name' => $this->name,
        ]);
    }
}
