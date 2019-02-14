<?php

declare(strict_types=1);

namespace WebDebug\Builders\Interfaces;

/**
 * Interface ISchemeBuilder
 * @package WebDebug\Builders\Interfaces
 */
interface ISchemeBuilder
{
    /**
     * Get supported version of scheme
     * for this builder
     *
     * @return int
     */
    public function getVersion(): int;
}