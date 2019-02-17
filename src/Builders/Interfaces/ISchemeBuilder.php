<?php

declare(strict_types=1);

namespace WebDebug\Builders\Interfaces;

/**
 * Interface ISchemeBuilder.
 */
interface ISchemeBuilder
{
    /**
     * Get supported version of scheme
     * for this builder.
     *
     * @return int
     */
    public function getVersion(): int;

    /**
     * Build all models to json string
     * matched scheme with specified version.
     *
     * @return string
     */
    public function build(): string;
}
