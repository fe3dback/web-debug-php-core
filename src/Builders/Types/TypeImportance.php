<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property int $importance Importance is int from 1 to 8, used for filtering in client
 *
 * @see https://web-debug.dev/docs/scheme/types.html#importance
 */
final class TypeImportance extends AbstractType
{
    public const DEBUG = 1;
    public const INFO = 2;
    public const NOTICE = 3;
    public const WARNING = 4;
    public const ERROR = 5;
    public const CRITICAL = 6;
    public const ALERT = 7;
    public const EMERGENCY = 8;

    /**
     * @param int $importance Importance is int from 1 to 8, used for filtering in client
     */
    public function __construct(int $importance)
    {
        $this->importance = $importance;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->importance;
    }
}
