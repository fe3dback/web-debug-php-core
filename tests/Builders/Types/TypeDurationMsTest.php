<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeDurationMs;

class TypeDurationMsTest extends TestCase
{
    public function test__construct()
    {
        $d = new TypeDurationMs(100);
        $this->assertSame($d->durationMs, 100);
        $this->assertSame($d->export(1), 100);
        $this->assertIsInt($d->export(1));
    }
}
