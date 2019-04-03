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
     * event type define object properties of `payload`.
     *
     * @var string
     */
    private $type;

    /**
     * event date-time in ms.
     *
     * @var TypeTsMs
     */
    private $time;

    /**
     * used for filtering in client.
     *
     * @var TypeImportance
     */
    private $importance;

    /**
     * contains other nested Events.
     *
     * @var EventCollection
     */
    private $nestedEventCollection;

    /**
     * used for filtering in client.
     *
     * @var TypeTagCollection
     */
    private $tagsCollection;

    /**
     * event duration in ms.
     *
     * @var TypeDurationMs|null
     */
    private $duration;

    /**
     * false in case of error / alarm. Will be highlighted in client.
     *
     * @var bool|null
     */
    private $success;

    /**
     * code location, where this event is called from (ex. controller where template is being rendered).
     *
     * @var TypeLocation|null
     */
    private $calledFrom;

    /**
     * where code defined in (ex. path to template file).
     *
     * @var TypeLocation|null
     */
    private $definedIn;

    /**
     * AbstractEvent constructor.
     *
     * @param string $eventType event type define object properties of `payload`
     */
    public function __construct(string $eventType)
    {
        $this->type = $eventType;

        // set common properties
        $this->setTime(new TypeTsMs());
        $this->setImportance(new TypeImportance(TypeImportance::DEBUG));
        $this->setNestedEventCollection(new EventCollection());
        $this->setTagsCollection(new TypeTagCollection());
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'type' => $this->getType(),
            'payload' => $this->getPayload($schemeVersion),
            'tags' => $this->getTagsCollection(),
            'importance' => $this->getImportance(),
            'time' => $this->getTime(),
            'duration' => $this->getDuration(),
            'success' => $this->getSuccess(),
            'calledFrom' => $this->getCalledFrom(),
            'definedIn' => $this->getDefinedIn(),
            'nested' => $this->getNestedEventCollection(),
        ]);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return TypeTsMs
     */
    public function getTime(): TypeTsMs
    {
        return $this->time;
    }

    /**
     * @param TypeTsMs $time
     */
    public function setTime(TypeTsMs $time): void
    {
        $this->time = $time;
    }

    /**
     * @return TypeImportance
     */
    public function getImportance(): TypeImportance
    {
        return $this->importance;
    }

    /**
     * @param TypeImportance $importance
     */
    public function setImportance(TypeImportance $importance): void
    {
        $this->importance = $importance;
    }

    /**
     * @return EventCollection
     */
    public function getNestedEventCollection(): EventCollection
    {
        return $this->nestedEventCollection;
    }

    /**
     * @param EventCollection $nestedEventCollection
     */
    public function setNestedEventCollection(EventCollection $nestedEventCollection): void
    {
        $this->nestedEventCollection = $nestedEventCollection;
    }

    /**
     * @return TypeTagCollection
     */
    public function getTagsCollection(): TypeTagCollection
    {
        return $this->tagsCollection;
    }

    /**
     * @param TypeTagCollection $tagsCollection
     */
    public function setTagsCollection(TypeTagCollection $tagsCollection): void
    {
        $this->tagsCollection = $tagsCollection;
    }

    /**
     * @return TypeDurationMs|null
     */
    public function getDuration(): ?TypeDurationMs
    {
        return $this->duration;
    }

    /**
     * @param TypeDurationMs|null $duration
     */
    public function setDuration(?TypeDurationMs $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }

    /**
     * @param bool|null $success
     */
    public function setSuccess(?bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return TypeLocation|null
     */
    public function getCalledFrom(): ?TypeLocation
    {
        return $this->calledFrom;
    }

    /**
     * @param TypeLocation|null $calledFrom
     */
    public function setCalledFrom(?TypeLocation $calledFrom): void
    {
        $this->calledFrom = $calledFrom;
    }

    /**
     * @return TypeLocation|null
     */
    public function getDefinedIn(): ?TypeLocation
    {
        return $this->definedIn;
    }

    /**
     * @param TypeLocation|null $definedIn
     */
    public function setDefinedIn(?TypeLocation $definedIn): void
    {
        $this->definedIn = $definedIn;
    }
}
