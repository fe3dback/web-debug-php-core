<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * Class Param.
 *
 * @property string $key   param title/code/name
 * @property string $value param value
 *
 * @see https://web-debug.dev/docs/scheme/types.html#param
 */
final class TypeParam extends AbstractType
{
    /**
     * Param constructor.
     *
     * @param string $key   param title/code/name
     * @param string $value param value
     */
    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return self::build($schemeVersion, [
            'key' => $this->key,
            'value' => $this->value,
        ]);
    }
}
