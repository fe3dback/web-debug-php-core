<?php

declare(strict_types=1);

namespace WebDebug\Builders\Interfaces;

/**
 * Interface IExportable.
 */
interface IExportable
{
    /**
     * Export value to scheme model field.
     *
     * @param int $schemeVersion
     *
     * @return string|int|array
     *
     * @internal
     */
    public function export(int $schemeVersion);
}
