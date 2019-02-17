<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use InvalidArgumentException;
use Str\Str;

/**
 * @property string $uuid
 */
final class UUID extends AbstractType
{
    /**
     * @param string|null $uuid
     */
    public function __construct(string $uuid = null)
    {
        if (null === $uuid) {
            /* @noinspection PhpUnhandledExceptionInspection */
            $this->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();

            return;
        }

        if (!Str::make($uuid)->isUUIDv4()) {
            throw new InvalidArgumentException('Param uuid should be valid UUIDv4');
        }

        $this->uuid = $uuid;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->uuid;
    }
}
