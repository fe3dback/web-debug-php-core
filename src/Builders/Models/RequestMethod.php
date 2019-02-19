<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

use WebDebug\Builders\Types\Method;

/**
 * @property \WebDebug\Builders\Types\Method $httpMethod request HTTP method
 */
class RequestMethod extends AbstractModel
{
    /**
     * RequestMethod constructor.
     * @param Method $httpMethod
     */
    public function __construct(Method $httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function exportModel(int $schemeVersion)
    {
        return $this->httpMethod->export($schemeVersion);
    }
}
