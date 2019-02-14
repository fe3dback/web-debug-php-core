<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models\Interfaces;

/**
 * Interface IModel
 * @package WebDebug\Builders\Models\Interfaces
 */
interface IModel
{
    /**
     * Return scheme property(model) name
     *
     * @param int $schemeVersion
     * @return string
     */
    public function getName(int $schemeVersion): string;

    /**
     * Export model as scheme property, ready
     * for json conversion
     *
     * @param int $schemeVersion
     * @return string|int|array
     */
    public function export(int $schemeVersion);
}