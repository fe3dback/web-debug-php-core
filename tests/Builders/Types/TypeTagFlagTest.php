<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeTagFlag;

/**
 * Class TypeTagFlagTest.
 */
class TypeTagFlagTest extends TestCase
{
    public function test__construct()
    {
        $type = new TypeTagFlag('is_prod');
        $this->assertSame($type->getValue(), 'is_prod');
        $this->assertSame($type->getValue(), $type->export(1));
    }

    public function test_notMultipart()
    {
        $this->expectException(InvalidArgumentException::class);

        new TypeTagFlag('g:v');
    }
}
