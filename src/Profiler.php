<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

namespace WebDebug;

use Psr\SimpleCache\CacheInterface;
use Ramsey\Uuid\Uuid;
use WebDebug\Builders\SchemeBuilderV1;

/**
 * Class Profiler
 * @package WebDebug
 */
final class Profiler
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var CacheInterface
     */
    private $storage;

    /**
     * Profiler constructor.
     * @param CacheInterface $storage
     */
    public function __construct(CacheInterface $storage)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->uuid = Uuid::uuid4()->toString();

        $this->storage = $storage;
    }

    /**
     * @return SchemeBuilderV1
     */
    public function getBuilderV1(): SchemeBuilderV1
    {
        return new SchemeBuilderV1();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->uuid;
    }
}