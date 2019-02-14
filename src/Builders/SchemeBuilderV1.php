<?php

declare(strict_types=1);

namespace WebDebug\Builders;

use WebDebug\Builders\Interfaces\ISchemeBuilder;

/**
 * Class SchemeBuilderV1
 * @package WebDebug\Builders
 */
class SchemeBuilderV1 implements ISchemeBuilder
{
    public const PROP_ID = 'id';
    public const PROP_VERSION = 'version';
    public const PROP_REQUEST_AT = 'request_at';
    public const PROP_REQUEST_METHOD = 'request_method';
    public const PROP_REQUEST_URI = 'request_uri';
    public const PROP_REQUEST_HEADERS = 'request_headers';
    public const PROP_REQUEST_QUERY = 'request_query';
    public const PROP_REQUEST_BODY = 'request_body';
    public const PROP_REQUEST_COOKIES = 'request_cookies';
    public const PROP_SESSION_PARAMS = 'session_params';
    public const PROP_ROUTE = 'route';
    public const PROP_MIDDLEWARE = 'middleware';
    public const PROP_MEMORY_PEAK = 'memory_peak';
    public const PROP_USER = 'user';
    public const PROP_ACL = 'acl';
    public const PROP_DB_QUERIES = 'db_queries';
    public const PROP_CACHE_QUERIES = 'cache_queries';
    public const PROP_LOGS = 'logs';
    public const PROP_EMAILS = 'emails';
    public const PROP_TEMPLATES = 'templates';
    public const PROP_EVENTS = 'events';
    public const PROP_RESPONSE_AT = 'response_at';
    public const PROP_RESPONSE_CODE = 'response_code';

    /**
     * @inheritdoc
     */
    public function getVersion(): int
    {
        return 1;
    }
}