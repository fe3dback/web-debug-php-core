<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#uri
 * @see https://en.wikipedia.org/wiki/Uniform_Resource_Identifier
 */
final class TypeUri extends AbstractType
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $uri relative or absolute uri
     */
    public function __construct(string $uri)
    {
        $this->setValue($uri);
    }

    /**
     * "https://example.com:443/api/hello?foo=bar".
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
