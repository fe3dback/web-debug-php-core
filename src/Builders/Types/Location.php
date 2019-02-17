<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property \WebDebug\Builders\Types\RelPath $relPath
 * @property int                              $line
 * @property int                              $pos
 * @property int                              $posEnd
 */
final class Location extends AbstractType
{
    /**
     * Allows you to specify the exact link to the position in the project code.
     *
     * LocationType constructor.
     *
     * @param RelPath $relPath relative path to project root
     */
    public function __construct(RelPath $relPath)
    {
        $this->relPath = $relPath;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return [
            'file' => $this->relPath,
            'line' => $this->line,
            'pos' => $this->pos,
            'pos_end' => $this->posEnd,
        ];
    }
}
