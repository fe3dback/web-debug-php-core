<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeByte;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#response
 */
class EventResponse extends AbstractEvent
{
    /**
     * max/peak memory usage (in bytes) during request.
     *
     * @var TypeByte
     */
    private $memoryPeak;

    public function __construct()
    {
        parent::__construct(self::EVENT_TYPE_RESPONSE);

        $this->setMemoryPeak(new TypeByte(memory_get_peak_usage(true)));
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'memoryPeak' => $this->getMemoryPeak(),
        ]);
    }

    /**
     * @return TypeByte
     */
    public function getMemoryPeak(): TypeByte
    {
        return $this->memoryPeak;
    }

    /**
     * @param TypeByte $memoryPeak
     */
    public function setMemoryPeak(TypeByte $memoryPeak): void
    {
        $this->memoryPeak = $memoryPeak;
    }
}
