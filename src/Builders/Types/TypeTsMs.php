<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property float $time unixtime (GMT) with milliseconds
 *
 * @see https://web-debug.dev/docs/scheme/types.html#tsms
 */
final class TypeTsMs extends AbstractType
{
    /**
     * TsMili constructor.
     */
    public function __construct()
    {
        $this->time = (float) microtime(true);
    }

    /**
     * unixtime (GMT) with milliseconds
     * 1547058561177.
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return (int) number_format($this->time, 3, '', '');
    }
}
