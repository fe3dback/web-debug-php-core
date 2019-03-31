<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Ramsey\Collection\AbstractCollection;

/**
 * Class TypeTagCollection.
 */
final class TypeTagCollection extends AbstractCollection
{
    /**
     * Returns the type associated with this collection.
     *
     * @return string
     */
    public function getType(): string
    {
        return AbstractType::class;
    }
}
