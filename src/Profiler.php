<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

namespace WebDebug;

use Psr\SimpleCache\CacheException;
use Psr\SimpleCache\CacheInterface;
use RuntimeException;
use Str\Str;
use WebDebug\Builders\EventCollection;
use WebDebug\Builders\Events\Interfaces\IEvent;
use WebDebug\Builders\Scheme;
use WebDebug\Builders\Types\TypeUUID;

/**
 * Class Profiler.
 *
 * @property TypeUUID $uuid
 * @property bool     $isProductionMode
 * @property int      $version
 */
final class Profiler
{
    public const VERSION_1 = 1;
    private const STORAGE_KEY = '_wdpr__%uuid%';

    /**
     * @var Scheme
     */
    private $scheme;

    /**
     * @var CacheInterface
     */
    private $storage;

    /**
     * Profiler constructor.
     *
     * @param int            $version
     * @param CacheInterface $storage
     * @param bool           $isProductionMode
     */
    public function __construct(int $version, CacheInterface $storage, bool $isProductionMode)
    {
        $this->uuid = new TypeUUID();
        $this->isProductionMode = $isProductionMode;
        $this->version = $version;

        $this->storage = $storage;
        $this->scheme = new Scheme($this->uuid);
    }

    /**
     * @param IEvent $event
     *
     * @return Profiler
     */
    public function addEvent(IEvent $event): self
    {
        $this->scheme->events->add($event);

        return $this;
    }

    /**
     * @return EventCollection
     */
    public function getEventCollection(): EventCollection
    {
        return $this->scheme->events;
    }

    /**
     * Store request debug object to psr6 storage
     * and return UUID of stored request.
     *
     * This function does nothing in production
     *
     * @return string
     */
    public function push(): string
    {
        if ($this->isProductionMode) {
            return $this->uuid->uuid;
        }

        try {
            $this->storage->set(
                $this->getStorageKey($this->uuid->uuid),
                json_encode($this->scheme->export($this->version))
            );
        } catch (CacheException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }

        return $this->uuid->uuid;
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
     */
    public function pop(string $uuid): ?string
    {
        if ($this->isProductionMode) {
            return null;
        }

        try {
            $k = $this->getStorageKey($uuid);
            $jsonString = (string) $this->storage->get($k);
            $this->storage->delete($k);
        } catch (CacheException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }

        if ('' === $jsonString) {
            return null;
        }

        return $jsonString;
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
            ->getString()
        ;
    }
}
