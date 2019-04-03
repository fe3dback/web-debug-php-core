<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#param
 */
final class TypeParam extends AbstractType
{
    /**
     * parameter title/code/name.
     *
     * @var string
     */
    private $key;

    /**
     * parameter value.
     *
     * @var string
     */
    private $value;

    /**
     * Param constructor.
     *
     * @param string $key   param title/code/name
     * @param string $value param value
     */
    public function __construct(string $key, string $value)
    {
        $this->setKey($key);
        $this->setValue($value);
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return self::build($schemeVersion, [
            'key' => $this->getKey(),
            'value' => $this->getValue(),
        ]);
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
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
