<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#tag
 */
abstract class AbstractTag extends AbstractType
{
    /**
     * @var string
     */
    private $value;

    /**
     * AbstractTag constructor.
     *
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        $this->setValue($tag);
    }

    /**
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
