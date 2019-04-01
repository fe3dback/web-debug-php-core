<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeLocation;
use WebDebug\Builders\Types\TypeRelativePath;

class TypeLocationTest extends TestCase
{
    public function test__construct()
    {
        $loc = new TypeLocation(new TypeRelativePath('hello\\world'));
        $this->assertSame($loc->relativePath->export(1), '/hello/world');
        $this->assertIsArray($loc->export(1));
        $this->assertArrayHasKey('relativePath', $loc->export(1));
        $this->assertArrayNotHasKey('line', $loc->export(1));
        $this->assertArrayNotHasKey('randomKey', $loc->export(1));
        $this->assertArrayNotHasKey('positionStart', $loc->export(1));
        $this->assertArrayNotHasKey('positionEnd', $loc->export(1));

        $loc = new TypeLocation(new TypeRelativePath('hello\\world'));
        $loc->line = 100;
        $this->assertArrayHasKey('relativePath', $loc->export(1));
        $this->assertArrayHasKey('line', $loc->export(1));
        $this->assertArrayNotHasKey('positionStart', $loc->export(1));
        $this->assertArrayNotHasKey('positionEnd', $loc->export(1));

        $loc->positionStart = 100;
        $this->assertArrayHasKey('positionStart', $loc->export(1));

        $loc->positionEnd = 25;
        $this->assertArrayHasKey('positionEnd', $loc->export(1));

        $this->assertSame(((array) $loc->export(1))['positionStart'], 100);
        $this->assertSame(((array) $loc->export(1))['positionEnd'], 25);
        $this->assertSame(((array) $loc->export(1))['line'], 100);
        $this->assertSame(((array) $loc->export(1))['relativePath'], '/hello/world');
    }
}
