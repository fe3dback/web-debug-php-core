<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Str\Str;

/**
 * Class TagFlag.
 */
final class TypeTagFlag extends AbstractTag
{
    /**
     * AbstractTag constructor.
     *
     * @param string $flag
     */
    public function __construct(string $flag)
    {
        if (Str::make($flag)->contains(':')) {
            throw new \InvalidArgumentException(vsprintf(
                'Argument 1 in constructor of %s should not contain `:` (colon)', [
                    self::class,
                ]
            ));
        }

        parent::__construct($flag);
    }
}
