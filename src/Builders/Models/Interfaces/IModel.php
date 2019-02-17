<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models\Interfaces;

/**
 * Interface IModel.
 */
interface IModel
{
    /**
     * Export model as scheme property, ready
     * for json conversion.
     *
     * @param int $schemeVersion
     *
     * @return string|int|array
     *
     * @internal
     */
    public function exportModel(int $schemeVersion);
}
