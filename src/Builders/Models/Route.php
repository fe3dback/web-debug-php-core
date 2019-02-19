<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

/**
 * @property string                            $urlTemplate    Url template with placeholders
 * @property string                            $name           Unique route name (id)
 * @property string                            $resource       route target, this can be controller, action or view name
 * @property string                            $nameSpace      Namespace or group, usually this is prefix
 * @property string                            $type           helpful if you have many route types (api based, controllers, callbacks, views, etc..)
 * @property \WebDebug\Builders\Types\Method[] $allowedMethods list of allowed request methods for this route
 * @property \WebDebug\Builders\Types\Location $resourceLoc    where is target resource located
 * @property \WebDebug\Builders\Types\Location $definedIn      where is this route defined
 */
class Route extends AbstractModel
{
    /**
     * RouteModel constructor.
     *
     * @param string $urlTemplate Url template with placeholders
     */
    public function __construct(string $urlTemplate)
    {
        $this->urlTemplate = $urlTemplate;
    }

    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function exportModel(int $schemeVersion)
    {
        return [
            'url_template' => $this->urlTemplate,
            'name' => (string) $this->name,
            'resource' => (string) $this->resource,
            'name_space' => (string) $this->nameSpace,
            'type' => (string) $this->type,
            'allowed_methods' => $this->allowedMethods,
            'resource_loc' => $this->resourceLoc,
            'defined_in' => $this->definedIn,
        ];
    }
}
