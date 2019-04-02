<?php

declare(strict_types=1);

namespace WebDebug\Builders;

use Ramsey\Collection\AbstractCollection;
use WebDebug\Builders\Events\Interfaces\IEvent;

/**
 * Class EventCollection.
 */
final class EventCollection extends AbstractCollection
{
    /**
     * Returns the type associated with this collection.
     *
     * @return string
     */
    public function getType(): string
    {
        return IEvent::class;
    }
}
