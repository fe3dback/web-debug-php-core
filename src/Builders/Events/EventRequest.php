<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeMethod;
use WebDebug\Builders\Types\TypeParamCollection;
use WebDebug\Builders\Types\TypeUri;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#request
 */
class EventRequest extends AbstractEvent
{
    /**
     * request HTTP method.
     *
     * @var TypeMethod|null
     */
    private $method;

    /**
     * full request uri.
     *
     * @var TypeUri|null
     */
    private $uri;

    /**
     * list of received request headers.
     *
     * @var TypeParamCollection
     */
    private $headersCollection;

    /**
     * list of received request query (GET) params.
     *
     * @var TypeParamCollection
     */
    private $queryParamsCollection;

    /**
     * list of received request body (POST) params.
     *
     * @var TypeParamCollection
     */
    private $bodyParamsCollection;

    /**
     * list of received request cookies.
     *
     * @var TypeParamCollection
     */
    private $cookiesCollection;

    /**
     * loaded session params.
     *
     * @var TypeParamCollection
     */
    private $sessionCollection;

    public function __construct()
    {
        parent::__construct(self::EVENT_TYPE_REQUEST);

        $this->setHeadersCollection(new TypeParamCollection());
        $this->setQueryParamsCollection(new TypeParamCollection());
        $this->setBodyParamsCollection(new TypeParamCollection());
        $this->setCookiesCollection(new TypeParamCollection());
        $this->setSessionCollection(new TypeParamCollection());
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'method' => $this->getMethod(),
            'uri' => $this->getUri(),
            'headers' => $this->getHeadersCollection(),
            'query' => $this->getQueryParamsCollection(),
            'body' => $this->getBodyParamsCollection(),
            'cookies' => $this->getCookiesCollection(),
            'session' => $this->getSessionCollection(),
        ]);
    }

    /**
     * @return TypeMethod|null
     */
    public function getMethod(): ?TypeMethod
    {
        return $this->method;
    }

    /**
     * @param TypeMethod|null $method
     */
    public function setMethod(?TypeMethod $method): void
    {
        $this->method = $method;
    }

    /**
     * @return TypeUri|null
     */
    public function getUri(): ?TypeUri
    {
        return $this->uri;
    }

    /**
     * @param TypeUri|null $uri
     */
    public function setUri(?TypeUri $uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return TypeParamCollection
     */
    public function getHeadersCollection(): TypeParamCollection
    {
        return $this->headersCollection;
    }

    /**
     * @param TypeParamCollection $headersCollection
     */
    public function setHeadersCollection(TypeParamCollection $headersCollection): void
    {
        $this->headersCollection = $headersCollection;
    }

    /**
     * @return TypeParamCollection
     */
    public function getQueryParamsCollection(): TypeParamCollection
    {
        return $this->queryParamsCollection;
    }

    /**
     * @param TypeParamCollection $queryParamsCollection
     */
    public function setQueryParamsCollection(TypeParamCollection $queryParamsCollection): void
    {
        $this->queryParamsCollection = $queryParamsCollection;
    }

    /**
     * @return TypeParamCollection
     */
    public function getBodyParamsCollection(): TypeParamCollection
    {
        return $this->bodyParamsCollection;
    }

    /**
     * @param TypeParamCollection $bodyParamsCollection
     */
    public function setBodyParamsCollection(TypeParamCollection $bodyParamsCollection): void
    {
        $this->bodyParamsCollection = $bodyParamsCollection;
    }

    /**
     * @return TypeParamCollection
     */
    public function getCookiesCollection(): TypeParamCollection
    {
        return $this->cookiesCollection;
    }

    /**
     * @param TypeParamCollection $cookiesCollection
     */
    public function setCookiesCollection(TypeParamCollection $cookiesCollection): void
    {
        $this->cookiesCollection = $cookiesCollection;
    }

    /**
     * @return TypeParamCollection
     */
    public function getSessionCollection(): TypeParamCollection
    {
        return $this->sessionCollection;
    }

    /**
     * @param TypeParamCollection $sessionCollection
     */
    public function setSessionCollection(TypeParamCollection $sessionCollection): void
    {
        $this->sessionCollection = $sessionCollection;
    }
}
