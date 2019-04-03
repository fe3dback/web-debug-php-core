<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#byte
 */
final class TypeByte extends AbstractType
{
    /**
     * @var int size in bytes
     */
    private $value;

    /**
     * @param int $bytes size in bytes
     */
    public function __construct(int $bytes)
    {
        $this->setValue($bytes);
    }

    /**
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
