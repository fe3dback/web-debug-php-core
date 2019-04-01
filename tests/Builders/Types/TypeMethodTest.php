<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeMethod;

class TypeMethodTest extends TestCase
{
    public function test__construct()
    {
        $m = new TypeMethod('get');
        $this->assertSame($m->method, 'GET');
        $this->assertSame($m->method, $m->export(1));
    }
}
