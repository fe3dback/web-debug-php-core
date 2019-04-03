<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
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
     * @var int Importance is int from 1 to 8, used for filtering in client
     */
    private $value;

    /**
     * @param int $importance Importance is int from 1 to 8, used for filtering in client
     */
    public function __construct(int $importance)
    {
        if ($importance < 1) {
            $importance = 1;
        }

        if ($importance > 8) {
            $importance = 8;
        }

        $this->setValue($importance);
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->getValue();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}
