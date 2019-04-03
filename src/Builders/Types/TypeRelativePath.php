<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Str\Str;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#relativepath
 */
final class TypeRelativePath extends AbstractType
{
    /**
     * Should be relative to root project directory.
     *
     * @var string
     */
    private $value;

    /**
     * @param string $relPath
     *
     * Server rules
     * - Should be relative to root project directory
     * - file path SHOULD start with "/"
     * - Directory separator SHOULD BE "/" on all operation systems
     */
    public function __construct(string $relPath)
    {
        $this->setValue(Str::make($relPath)
            ->ensureLeft('/')
            ->replace('\\', '/')
            ->getString()
        );
    }

    /**
     * "/src/renderer/main.js".
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
