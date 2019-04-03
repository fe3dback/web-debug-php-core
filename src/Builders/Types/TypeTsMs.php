<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#tsms
 */
final class TypeTsMs extends AbstractType
{
    /**
     * unixtime (GMT) with milliseconds.
     *
     * @var float
     */
    private $value;

    /**
     * TsMili constructor.
     */
    public function __construct()
    {
        $this->setValue((float) microtime(true));
    }

    /**
     * unixtime (GMT) with milliseconds
     * 1547058561177.
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return (int) number_format($this->getValue(), 3, '', '');
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }
}
