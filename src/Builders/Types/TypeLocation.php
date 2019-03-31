<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property \WebDebug\Builders\Types\TypeRelativePath $relativePath  relative path to project root
 * @property int                                       $line          line in file
 * @property int                                       $positionStart cursor position in line (work only if "line" defined)
 * @property int                                       $positionEnd   cursor end position in line (work only if "pos" defined)
 *
 * @see https://web-debug.dev/docs/scheme/types.html#location
 */
final class TypeLocation extends AbstractType
{
    /**
     * Location constructor.
     *
     * @param TypeRelativePath $relativePath relative path to project root
     */
    public function __construct(TypeRelativePath $relativePath)
    {
        $this->relativePath = $relativePath;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return self::build($schemeVersion, [
            'relativePath' => $this->relativePath,
            'line' => $this->line,
            'positionStart' => $this->positionStart,
            'positionEnd' => $this->positionEnd,
        ]);
    }
}
