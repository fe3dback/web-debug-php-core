<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @property string $htmlString
 */
final class Html extends AbstractType
{
    /**
     * HtmlType constructor.
     *
     * @param string $htmlString
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
