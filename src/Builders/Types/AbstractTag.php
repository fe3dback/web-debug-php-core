<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property string $tag
 *
 * @see https://web-debug.dev/docs/scheme/types.html#tag
 */
abstract class AbstractTag extends AbstractType
{
    /**
     * AbstractTag constructor.
     *
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->tag;
    }
}
