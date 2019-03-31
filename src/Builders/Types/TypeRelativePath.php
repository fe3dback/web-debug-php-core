<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Str\Str;

/**
 * @property string $relativePath
 *
 * @see https://web-debug.dev/docs/scheme/types.html#relativepath
 */
final class TypeRelativePath extends AbstractType
{
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
        $this->relativePath = Str::make($relPath)
            ->ensureLeft('/')
            ->replace('\\', '/')
            ->getString()
        ;
    }

    /**
     * "/src/renderer/main.js".
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->relativePath;
    }
}
