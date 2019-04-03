<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#event
 */
class EventEvent extends AbstractEvent
{
    /**
     * Called event name (listener class, id, etc..).
     *
     * @var string
     */
    private $name;

    /**
     * Helpful if you want split event by logic groups (kernel, loader, app, etc..).
     *
     * @var string|null
     */
    private $group;

    /**
     * EventEvent constructor.
     *
     * @param string $name Middleware name
     */
    public function __construct(string $name)
    {
        parent::__construct(self::EVENT_TYPE_EVENT);

        $this->setName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'name' => $this->getName(),
            'group' => $this->getGroup(),
        ]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }

    /**
     * @param string|null $group
     */
    public function setGroup(?string $group): void
    {
        $this->group = $group;
    }
}
