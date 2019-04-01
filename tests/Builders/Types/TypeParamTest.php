<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeParam;

class TypeParamTest extends TestCase
{
    public function test__construct()
    {
        $p = new TypeParam('key', 'value');
        $this->assertIsArray($p->export(1));
        $this->assertSame($p->key, 'key');
        $this->assertSame($p->value, 'value');
        $this->assertArrayHasKey('key', $p->export(1));
        $this->assertArrayHasKey('value', $p->export(1));
    }
}
