<?php

declare(strict_types=1);

namespace WebDebug\Builders;

use WebDebug\Builders\Types\TypeUUID;

/**
 * Class Scheme.
 *
 * @property TypeUUID        $id     unique request id (uuid)
 * @property EventCollection $events debug/profile information about request
 */
class Scheme extends AbstractObject
{
    /**
     * Scheme constructor.
     *
     * @param TypeUUID $id
     */
    public function __construct(TypeUUID $id)
    {
        $this->id = $id;
        $this->events = new EventCollection();
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
            'id' => $this->id,
            'version' => $schemeVersion,
            'events' => $this->events,
        ]);
    }
}
