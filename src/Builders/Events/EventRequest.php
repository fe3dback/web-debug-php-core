<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeMethod;
use WebDebug\Builders\Types\TypeParamCollection;
use WebDebug\Builders\Types\TypeUri;

/**
 * Class EventRequest.
 *
 * @property TypeMethod          $method  request HTTP method
 * @property TypeUri             $uri     full request uri
 * @property TypeParamCollection $headers list of received request headers
 * @property TypeParamCollection $query   list of received request query (GET) params
 * @property TypeParamCollection $body    list of received request body (POST) params
 * @property TypeParamCollection $cookies list of received request cookies
 * @property TypeParamCollection $session loaded session params
 *
 * @see https://web-debug.dev/docs/scheme/events.html#request
 */
class EventRequest extends AbstractEvent
{
    public function __construct()
    {
        parent::__construct(self::EVENT_TYPE_REQUEST);
        $this->headers = new TypeParamCollection();
        $this->query = new TypeParamCollection();
        $this->body = new TypeParamCollection();
        $this->cookies = new TypeParamCollection();
        $this->session = new TypeParamCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'method' => $this->method,
            'uri' => $this->uri,
            'headers' => $this->headers,
            'query' => $this->query,
            'body' => $this->body,
            'cookies' => $this->cookies,
            'session' => $this->session,
        ]);
    }
}
