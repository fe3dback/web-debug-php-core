<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeByte;

/**
 * Class TypeByteTest.
 */
class TypeByteTest extends TestCase
{
    public function test__construct()
    {
        $b = new TypeByte(1024);
        $this->assertSame($b->getValue(), 1024);
        $this->assertSame($b->export(1), 1024);
    }
}
