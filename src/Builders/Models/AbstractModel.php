<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

use Serafim\Properties\Properties;
use WebDebug\Builders\Models\Interfaces\IModel;

/**
 * Class AbstractModel
 * @package WebDebug\Builders\Models
 */
abstract class AbstractModel implements IModel
{
    use Properties;
}