<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * Class DurationMs.
 *
 * @see https://web-debug.dev/docs/scheme/types.html#durationms
 */
final class TypeDurationMs extends AbstractType
{
    /**
     * @var int time duration in milliseconds
     */
    private $value;

    /**
     * @param int $durationMs time duration in milliseconds
     */
    public function __construct(int $durationMs)
    {
        $this->setValue($durationMs);
    }

    /**
     * time duration in milliseconds.
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->getValue();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}
