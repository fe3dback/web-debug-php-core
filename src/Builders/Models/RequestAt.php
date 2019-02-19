<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

use WebDebug\Builders\Types\TsMili;

/**
 * @property \WebDebug\Builders\Types\TsMili $tsMili request received at
 */
class RequestAt extends AbstractModel
{
    /**
     * RequestAt constructor.
     * @param TsMili $tsMili
     */
    public function __construct(TsMili $tsMili)
    {
        $this->tsMili = $tsMili;
    }

    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function exportModel(int $schemeVersion)
    {
        return $this->tsMili->export($schemeVersion);
    }
}
