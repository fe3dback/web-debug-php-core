<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types\Interfaces;

/**
 * Interface IType
 * @package WebDebug\Builders\Types\Interfaces
 */
interface IType
{
    /**
     * Export value to scheme model field.
     *
     * @param int $schemeVersion
     * @return string|int|array
     */
    public function export(int $schemeVersion);
}