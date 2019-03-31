<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * Class EventEvent.
 *
 * @property string $name  Called event name (listener class, id, etc..)
 * @property string $group Helpful if you want split event by logic groups (kernel, loader, app, etc..)
 *
 * @see https://web-debug.dev/docs/scheme/events.html#event
 */
class EventEvent extends AbstractEvent
{
    /**
     * EventEvent constructor.
     *
     * @param string $name Middleware name
     */
    public function __construct(string $name)
    {
        parent::__construct(self::EVENT_TYPE_EVENT);

        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'name' => $this->name,
            'group' => $this->group,
        ]);
    }
}
