<?php

declare(strict_types=1);

namespace WebDebug\Builders;

/**
 * @property \WebDebug\Builders\Models\Route $route matched route controller
 */
class SchemeBuilderV1 extends AbstractSchemeBuilder
{
    private const PROP_REQUEST_AT = 'request_at';
    private const PROP_REQUEST_METHOD = 'request_method';
    private const PROP_REQUEST_URI = 'request_uri';
    private const PROP_REQUEST_HEADERS = 'request_headers';
    private const PROP_REQUEST_QUERY = 'request_query';
    private const PROP_REQUEST_BODY = 'request_body';
    private const PROP_REQUEST_COOKIES = 'request_cookies';
    private const PROP_SESSION_PARAMS = 'session_params';
    private const PROP_ROUTE = 'route';
    private const PROP_MIDDLEWARE = 'middleware';
    private const PROP_MEMORY_PEAK = 'memory_peak';
    private const PROP_USER = 'user';
    private const PROP_ACL = 'acl';
    private const PROP_DB_QUERIES = 'db_queries';
    private const PROP_CACHE_QUERIES = 'cache_queries';
    private const PROP_LOGS = 'logs';
    private const PROP_EMAILS = 'emails';
    private const PROP_TEMPLATES = 'templates';
    private const PROP_EVENTS = 'events';
    private const PROP_RESPONSE_AT = 'response_at';
    private const PROP_RESPONSE_CODE = 'response_code';

    /**
     * {@inheritdoc}
     */
    public function getVersion(): int
    {
        return 1;
    }

    /**
     * @return array
     */
    protected function getSchemeModels(): array
    {
        return array_merge(parent::getSchemeModels(), [
            self::PROP_REQUEST_AT => null,
            self::PROP_REQUEST_METHOD => null,
            self::PROP_REQUEST_URI => null,
            self::PROP_REQUEST_HEADERS => null,
            self::PROP_REQUEST_QUERY => null,
            self::PROP_REQUEST_BODY => null,
            self::PROP_REQUEST_COOKIES => null,
            self::PROP_SESSION_PARAMS => null,
            self::PROP_ROUTE => $this->route,
            self::PROP_MIDDLEWARE => null,
            self::PROP_MEMORY_PEAK => null,
            self::PROP_USER => null,
            self::PROP_ACL => null,
            self::PROP_DB_QUERIES => null,
            self::PROP_CACHE_QUERIES => null,
            self::PROP_LOGS => null,
            self::PROP_EMAILS => null,
            self::PROP_TEMPLATES => null,
            self::PROP_EVENTS => null,
            self::PROP_RESPONSE_AT => null,
            self::PROP_RESPONSE_CODE => null,
        ]);
    }
}
