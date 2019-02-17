<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

use WebDebug\Builders\Types\UUID;

/**
 * @property \WebDebug\Builders\Types\UUID $uuid unique request id
 */
class Id extends AbstractModel
{
    /**
     * @param UUID $uuid
     */
    public function __construct(UUID $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function exportModel(int $schemeVersion)
    {
        return $this->uuid->export($schemeVersion);
    }
}
