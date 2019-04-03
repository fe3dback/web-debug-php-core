<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#query
 */
class EventQuery extends AbstractEvent
{
    public const SYNTAX_SQL = 'sql';
    public const SYNTAX_JSON = 'json';
    public const SYNTAX_XML = 'xml';
    public const SYNTAX_TEXT = 'text';

    /**
     * query target, for example db, io, cache or
     * service name (mysql, influxdb, redis, rabbitmq, etc..).
     * Used in client for group all request to same service.
     *
     * @var string
     */
    private $target;

    /**
     * request query string.
     *
     * @var string
     */
    private $query;

    /**
     * syntax for query highlight in client.
     *
     * @var string
     */
    private $syntax;

    /**
     * EventLog constructor.
     *
     * @param string $target query target, for example db, io, cache or service name (mysql, influxdb, redis, rabbitmq, etc..). Used in client for group all request to same service
     * @param string $query  request query string
     */
    public function __construct(string $target, string $query)
    {
        parent::__construct(self::EVENT_TYPE_QUERY);

        $this->setTarget($target);
        $this->setQuery($query);
        $this->setSyntax(self::SYNTAX_TEXT);
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'target' => $this->getTarget(),
            'query' => $this->getQuery(),
            'syntax' => $this->getSyntax(),
        ]);
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getSyntax(): string
    {
        return $this->syntax;
    }

    /**
     * @param string $syntax
     */
    public function setSyntax(string $syntax): void
    {
        $this->syntax = $syntax;
    }
}
