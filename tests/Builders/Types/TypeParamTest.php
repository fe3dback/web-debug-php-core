<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeParam;

/**
 * Class TypeParamTest.
 */
class TypeParamTest extends TestCase
{
    public function test__construct()
    {
        $p = new TypeParam('key', 'value');
        $this->assertIsArray($p->export(1));
        $this->assertSame($p->getKey(), 'key');
        $this->assertSame($p->getValue(), 'value');
        $this->assertArrayHasKey('key', $p->export(1));
        $this->assertArrayHasKey('value', $p->export(1));
    }
}
