<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Serafim\Properties\Properties;
use WebDebug\Builders\Types\Interfaces\IType;

abstract class AbstractType implements IType
{
    use Properties;
}