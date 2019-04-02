<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\AbstractObject;
use WebDebug\Builders\EventCollection;
use WebDebug\Builders\Events\Interfaces\IEvent;
use WebDebug\Builders\Types\TypeDurationMs;
use WebDebug\Builders\Types\TypeImportance;
use WebDebug\Builders\Types\TypeLocation;
use WebDebug\Builders\Types\TypeTagCollection;
use WebDebug\Builders\Types\TypeTsMs;

/**
 * Class AbstractEvent.
 *
 * @property string            $eventType  event type define object properties of `payload`
 * @property TypeTagCollection $tags       used for filtering in client
 * @property TypeImportance    $importance used for filtering in client
 * @property TypeTsMs          $time       event date-time in ms
 * @property TypeDurationMs    $duration   event duration in ms
 * @property bool              $success    false in case of error / alarm. Will be highlighted in client
 * @property TypeLocation      $calledFrom code location, where this event is called from (ex. controller where template is being rendered)
 * @property TypeLocation      $definedIn  where code defined in (ex. path to template file)
 * @property EventCollection   $nested     contains other nested Events
 *
 * @see https://web-debug.dev/docs/scheme/events.html
 */
abstract class AbstractEvent extends AbstractObject implements IEvent
{
    public const EVENT_TYPE_LOG = 'log';
    public const EVENT_TYPE_QUERY = 'query';
    public const EVENT_TYPE_REQUEST = 'request';
    public const EVENT_TYPE_RESPONSE = 'response';
    public const EVENT_TYPE_MIDDLEWARE = 'middleware';
    public const EVENT_TYPE_TEMPLATE = 'template';
    public const EVENT_TYPE_EMAIL = 'email';
    public const EVENT_TYPE_EVENT = 'event';
    public const EVENT_TYPE_ACCESS_CHECK = 'accessCheck';

    /**
     * AbstractEvent constructor.
     *
     * @param string $eventType event type define object properties of `payload`
     */
    public function __construct(string $eventType)
    {
        $this->eventType = $eventType;
        $this->time = new TypeTsMs();
        $this->importance = new TypeImportance(TypeImportance::DEBUG);
        $this->nested = new EventCollection();
        $this->tags = new TypeTagCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'type' => $this->eventType,
            'payload' => $this->getPayload($schemeVersion),
            'tags' => $this->tags,
            'importance' => $this->importance,
            'time' => $this->time,
            'duration' => $this->duration,
            'success' => $this->success,
            'calledFrom' => $this->calledFrom,
            'definedIn' => $this->definedIn,
            'nested' => $this->nested,
        ]);
    }
}
