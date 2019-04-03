<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#html
 */
final class TypeHtml extends AbstractType
{
    /**
     * @var string Valid html
     */
    private $value;

    /**
     * HtmlType constructor.
     *
     * @param string $htmlString Valid html
     */
    public function __construct(string $htmlString)
    {
        $this->setValue($htmlString);
    }

    /**
     * `Hello <b>world</b>`.
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
