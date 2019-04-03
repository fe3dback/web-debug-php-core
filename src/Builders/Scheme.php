<?php

declare(strict_types=1);

namespace WebDebug\Builders;

use WebDebug\Builders\Types\TypeUUID;

/**
 * Class Scheme.
 */
class Scheme extends AbstractObject
{
    /**
     * unique request id (uuid).
     *
     * @var TypeUUID
     */
    private $uuid;

    /**
     * debug/profile information about request.
     *
     * @var EventCollection
     */
    private $eventCollection;

    /**
     * Scheme constructor.
     *
     * @param TypeUUID $id
     */
    public function __construct(TypeUUID $id)
    {
        $this->uuid = $id;
        $this->eventCollection = new EventCollection();
    }

    /**
     * Export value to scheme model field.
     *
     * @param int $schemeVersion
     *
     * @return array
     *
     * @internal
     */
    public function export(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'id' => $this->getUuid(),
            'version' => $schemeVersion,
            'events' => $this->getEventCollection(),
        ]);
    }

    /**
     * @return TypeUUID
     */
    public function getUuid(): TypeUUID
    {
        return $this->uuid;
    }

    /**
     * @return EventCollection
     */
    public function getEventCollection(): EventCollection
    {
        return $this->eventCollection;
    }
}
