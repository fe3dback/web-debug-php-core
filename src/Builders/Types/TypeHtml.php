<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property string $htmlString Valid html
 *
 * @see https://web-debug.dev/docs/scheme/types.html#html
 */
final class TypeHtml extends AbstractType
{
    /**
     * HtmlType constructor.
     *
     * @param string $htmlString Valid html
     */
    public function __construct(string $htmlString)
    {
        $this->htmlString = $htmlString;
    }

    /**
     * `Hello <b>world</b>`.
     *
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->htmlString;
    }
}
