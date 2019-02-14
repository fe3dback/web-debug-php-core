<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use WebDebug\Builders\Types\Interfaces\IType;

/**
 * Class TsMili
 * @package WebDebug\Builders\Types
 */
final class TsMiliType implements IType
{
    /**
     * @var float
     */
    private $time;

    /**
     * TsMili constructor.
     */
    public function __construct()
    {
        $this->time = (float)microtime(true);
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * unixtime (GMT) with milliseconds
     * 1547058561177
     *
     * @inheritdoc
     */
    public function export(int $schemeVersion)
    {
        return (int)number_format(
            $this->getTime(), 3, '', ''
        );
    }
}