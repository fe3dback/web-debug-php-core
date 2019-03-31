<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * Class DurationMs.
 *
 * @property int $durationMs time duration in milliseconds
 *
 * @see https://web-debug.dev/docs/scheme/types.html#durationms
 */
final class TypeDurationMs extends AbstractType
{
    /**
     * @param int $durationMs time duration in milliseconds
     */
    public function __construct(int $durationMs)
    {
        $this->durationMs = $durationMs;
    }

    /**
     * time duration in milliseconds.
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->durationMs;
    }
}
