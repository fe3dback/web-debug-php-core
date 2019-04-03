<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#middleware
 */
class EventMiddleware extends AbstractEvent
{
    /**
     * Middleware name.
     *
     * @var string
     */
    private $name;

    /**
     * EventMiddleware constructor.
     *
     * @param string $name Middleware name
     */
    public function __construct(string $name)
    {
        parent::__construct(self::EVENT_TYPE_MIDDLEWARE);

        $this->setName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'name' => $this->getName(),
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
}
