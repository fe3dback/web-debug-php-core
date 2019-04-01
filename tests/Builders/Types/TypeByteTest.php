<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeByte;

class TypeByteTest extends TestCase
{
    public function test__construct()
    {
        $b = new TypeByte(1024);
        $this->assertSame($b->bytes, 1024);
        $this->assertSame($b->export(1), 1024);
    }
}
