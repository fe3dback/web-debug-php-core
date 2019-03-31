<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property int $bytes size in bytes
 *
 * @see https://web-debug.dev/docs/scheme/types.html#byte
 */
final class TypeByte extends AbstractType
{
    /**
     * @param int $bytes size in bytes
     */
    public function __construct(int $bytes)
    {
        $this->bytes = $bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->bytes;
    }
}
