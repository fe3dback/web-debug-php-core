<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeByte;

/**
 * Class EventResponse.
 *
 * @property TypeByte $memoryPeak max/peak memory usage (in bytes) during request
 *
 * @see https://web-debug.dev/docs/scheme/events.html#response
 */
class EventResponse extends AbstractEvent
{
    public function __construct()
    {
        parent::__construct(self::EVENT_TYPE_RESPONSE);

        $this->memoryPeak = new TypeByte(memory_get_peak_usage(true));
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'memoryPeak' => $this->memoryPeak,
        ]);
    }
}
