<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Ramsey\Collection\AbstractCollection;

/**
 * Class TypeParamCollection.
 */
final class TypeParamCollection extends AbstractCollection
{
    /**
     * Returns the type associated with this collection.
     *
     * @return string
     */
    public function getType(): string
    {
        return TypeParam::class;
    }
}
