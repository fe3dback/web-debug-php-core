<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use Ramsey\Uuid\Uuid;
use WebDebug\Builders\Types\Interfaces\IType;

/**
 * Class UUIDType
 * @package WebDebug\Builders\Types
 */
final class UUIDType implements IType
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * UUIDType constructor.
     */
    public function __construct()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

    /**
     * @inheritdoc
     */
    public function export(int $schemeVersion)
    {
        return $this->uuid;
    }
}