<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

use WebDebug\Builders\Models\Interfaces\IModel;
use WebDebug\Builders\SchemeBuilderV1;
use WebDebug\Builders\Types\UUIDType;
use WebDebug\Exceptions\SchemeVersionNotImplemented;

/**
 * Class IdModel
 * @package WebDebug\Builders\Models
 */
class IdModel implements IModel
{
    /**
     * @var UUIDType
     */
    private $UUIDType;

    /**
     * IdModel constructor.
     * @param UUIDType $UUIDType
     */
    public function __construct(UUIDType $UUIDType)
    {
        $this->UUIDType = $UUIDType;
    }

    /**
     * Return scheme property(model) name
     *
     * @param int $schemeVersion
     * @return string
     */
    public function getName(int $schemeVersion): string
    {
        if (1 === $schemeVersion) {
            return SchemeBuilderV1::PROP_ID;
        }

        throw new SchemeVersionNotImplemented($schemeVersion);
    }

    /**
     * @inheritdoc
     */
    public function export(int $schemeVersion)
    {
        return $this->UUIDType->export($schemeVersion);
    }
}