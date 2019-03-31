<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Str\Str;

/**
 * @property string $method HTTP Method (uppercase)
 *
 * @see https://web-debug.dev/docs/scheme/types.html#method
 */
final class TypeMethod extends AbstractType
{
    /**
     * @param string $method HTTP Method (uppercase)
     */
    public function __construct(string $method)
    {
        $this->method = Str::make($method)
            ->toUpperCase()
            ->getString()
        ;
    }

    /**
     * "POST".
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->method;
    }
}
