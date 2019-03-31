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
     * @var bool
     */
    private $isProductionMode;

    /**
     * Profiler constructor.
     *
     * @param CacheInterface $storage
     * @param bool           $isProductionMode
     *
     * @throws \Exception
     */
    public function __construct(CacheInterface $storage, bool $isProductionMode)
    {
        $this->uuid = Uuid::uuid4()->toString();
        $this->storage = $storage;
        $this->isProductionMode = $isProductionMode;
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
     * This function does nothing in production
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function store(): string
    {
        if (!$this->isProductionMode) {
            try {
                $this->storage->set(
                    $this->getStorageKey($this->getId()),
                    [] // @todo $this->builder->build()
                );
            } catch (CacheException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
        }

        return $this->getId();
    }

    /**
     * Load json profile data from storage
     * by UUID, or return null if not found.
     *
     * In production mode, this always return null
     *
     * @param string $uuid
     *
     * @return string|null
     *
     * @throws \Throwable
     */
    public function fetch(string $uuid): ?string
    {
        if ($this->isProductionMode) {
            return null;
        }

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
