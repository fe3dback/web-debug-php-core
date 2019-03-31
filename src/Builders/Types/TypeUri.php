<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property string $uri
 *
 * @see https://web-debug.dev/docs/scheme/types.html#uri
 * @see https://en.wikipedia.org/wiki/Uniform_Resource_Identifier
 */
final class TypeUri extends AbstractType
{
    /**
     * @param string $uri relative or absolute uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * "https://example.com:443/api/hello?foo=bar".
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->uri;
    }
}
