<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types\Interfaces;

/**
 * Interface IType.
 */
interface IType
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
