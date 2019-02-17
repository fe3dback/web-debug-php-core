<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Serafim\Properties\Properties;
use WebDebug\Builders\Types\Interfaces\IType;

/**
 * Class AbstractType
 * @package WebDebug\Builders\Types
 */
abstract class AbstractType implements IType
{
    use Properties;
}