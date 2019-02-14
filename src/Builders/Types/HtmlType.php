<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use WebDebug\Builders\Types\Interfaces\IType;

/**
 * Class TsMili
 * @package WebDebug\Builders\Types
 */
final class HtmlType implements IType
{
    /**
     * @var string
     */
    private $htmlString;

    /**
     * HtmlType constructor.
     * @param string $htmlString
     */
    public function __construct(string $htmlString)
    {
        $this->htmlString = $htmlString;
    }

    /**
     * `Hello <b>world</b>`
     *
     * @inheritdoc
     */
    public function export(int $schemeVersion)
    {
        return $this->htmlString;
    }
}