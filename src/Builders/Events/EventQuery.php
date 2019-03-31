<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

/**
 * Class EventQuery.
 *
 * @property string $target query target, for example db, io, cache or service name (mysql, influxdb, redis, rabbitmq, etc..). Used in client for group all request to same service
 * @property string $query  request query string
 * @property string $syntax syntax for query highlight in client
 *
 * @see https://web-debug.dev/docs/scheme/events.html#query
 */
class EventQuery extends AbstractEvent
{
    public const SYNTAX_SQL = 'sql';
    public const SYNTAX_JSON = 'json';
    public const SYNTAX_XML = 'xml';
    public const SYNTAX_TEXT = 'text';

    /**
     * EventLog constructor.
     *
     * @param string $target query target, for example db, io, cache or service name (mysql, influxdb, redis, rabbitmq, etc..). Used in client for group all request to same service
     * @param string $query  request query string
     */
    public function __construct(string $target, string $query)
    {
        parent::__construct(self::EVENT_TYPE_QUERY);

        $this->target = $target;
        $this->query = $query;
        $this->syntax = self::SYNTAX_TEXT;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'target' => $this->target,
            'query' => $this->query,
            'syntax' => $this->syntax,
        ]);
    }
}
