<?php

declare(strict_types=1);

namespace WebDebug\Builders;

use Ramsey\Collection\CollectionInterface;
use WebDebug\Builders\Interfaces\IExportable;

/**
 * Class AbstractObject.
 */
abstract class AbstractObject implements IExportable
{
    /**
     * @param int   $schemeVersion
     * @param array $list
     *
     * @return array
     */
    protected static function build(int $schemeVersion, array $list): array
    {
        return array_map(static function ($prop) use ($schemeVersion) {
            if ($prop instanceof CollectionInterface) {
                return self::build($schemeVersion, $prop->toArray());
            }

            if ($prop instanceof IExportable) {
                return $prop->export($schemeVersion);
            }

            if (\is_array($prop)) {
                return self::build($schemeVersion, $prop);
            }

            return $prop;
        }, self::filterNull($list));
    }

    /**
     * @param array $list
     *
     * @return array
     */
    private static function filterNull(array $list): array
    {
        return array_filter($list, static function ($property) {
            return null !== $property;
        });
    }
}
