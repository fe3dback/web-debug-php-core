<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * Class EventTemplate.
 *
 * @property string $name executed/rendered template name
 *
 * @see https://web-debug.dev/docs/scheme/events.html#template
 */
class EventTemplate extends AbstractEvent
{
    /**
     * EventTemplate constructor.
     *
     * @param string $name executed/rendered template name
     */
    public function __construct(string $name)
    {
        parent::__construct(self::EVENT_TYPE_TEMPLATE);

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
