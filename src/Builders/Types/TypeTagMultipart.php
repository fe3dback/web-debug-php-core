<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * Class TagMultipart.
 */
final class TypeTagMultipart extends AbstractTag
{
    /**
     * AbstractTag constructor.
     *
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        parent::__construct(vsprintf('%s:%s', [$name, $value]));
    }
}
