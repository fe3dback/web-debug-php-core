<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

namespace WebDebug;

use Psr\SimpleCache\CacheException;
use Psr\SimpleCache\CacheInterface;
use Ramsey\Uuid\Uuid;
use RuntimeException;
use Str\Str;

/**
 * Class Profiler.
 */
final class Profiler
{
    private const STORAGE_KEY = '_wdpr__%uuid%';

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var CacheInterface
     */
    private $storage;

    /**
     * @var int
     */
    private $builderVersion;

    /**
     * @var bool
     */
    private static $propertiesIsInitialized = false;

    /**
     * Profiler constructor.
     *
     * @param CacheInterface $storage
     *
     * @throws \Exception
     */
    public function __construct(CacheInterface $storage)
    {
        $this->uuid = Uuid::uuid4()->toString();
        $this->storage = $storage;

        if (false === self::$propertiesIsInitialized) {
//            $properties = Bootstrap::getInstance();
//            $properties->setCacheDriver($storage);

            self::$propertiesIsInitialized = true;
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->uuid;
    }

    /**
     * Store request debug object to psr6 storage
     * and return UUID of stored request.
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function store(): string
    {
        try {
            $this->storage->set(
                $this->getStorageKey($this->getId()),
                [] // @todo build scheme
            );
        } catch (CacheException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }

        return $this->getId();
    }

    /**
     * Load json profile data from storage
     * by UUID, or return null if not found.
     *
     * @param string $uuid
     *
     * @return string|null
     *
     * @throws \Throwable
     */
    public function fetch(string $uuid): ?string
    {
        try {
            $jsonString = $this->storage->get(
                $this->getStorageKey($uuid)
            );
        } catch (CacheException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }

        if (Str::make((string) $jsonString)->isJson()) {
            return $jsonString;
        }

        return null;
    }

    /**
     * Get full storage key by uuid.
     *
     * @param string $uuid
     *
     * @return string
     */
    private function getStorageKey(string $uuid): string
    {
        return Str::make(self::STORAGE_KEY)
            ->replace('%uuid%', $uuid)
            ->getString();
    }
}
