<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Str\Str;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#method
 */
final class TypeMethod extends AbstractType
{
    /**
     * HTTP Method (uppercase).
     *
     * @var string
     */
    private $value;

    /**
     * @param string $method HTTP Method (uppercase)
     */
    public function __construct(string $method)
    {
        $this->setValue(Str::make($method)
            ->toUpperCase()
            ->getString()
        );
    }

    /**
     * "POST".
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
