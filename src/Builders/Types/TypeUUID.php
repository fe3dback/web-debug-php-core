<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use Str\Str;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#uuid
 * @see https://tools.ietf.org/html/rfc4122
 */
final class TypeUUID extends AbstractType
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string|null $uuid
     */
    public function __construct(string $uuid = null)
    {
        if (null === $uuid) {
            /* @noinspection PhpUnhandledExceptionInspection */
            $this->setValue(Uuid::uuid4()->toString());

            return;
        }

        if (!Str::make($uuid)->isUUIDv4()) {
            throw new InvalidArgumentException('Param uuid should be valid UUIDv4');
        }

        $this->setValue($uuid);
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
