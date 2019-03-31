<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events\Interfaces;

use WebDebug\Builders\Interfaces\IExportable;

/**
 * Interface IEvent.
 */
interface IEvent extends IExportable
{
    /**
     * Export model as scheme property, ready
     * for json conversion.
     *
     * @param int $schemeVersion
     *
     * @return array
     *
     * @internal
     */
    public function getPayload(int $schemeVersion): array;
}
