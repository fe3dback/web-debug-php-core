<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeLocation;
use WebDebug\Builders\Types\TypeRelativePath;

/**
 * Class TypeLocationTest.
 */
class TypeLocationTest extends TestCase
{
    public function test__construct()
    {
        $loc = new TypeLocation(new TypeRelativePath('hello\\world'));
        $this->assertSame($loc->getRelativePath()->export(1), '/hello/world');
        $this->assertIsArray($loc->export(1));
        $this->assertArrayHasKey('relativePath', $loc->export(1));
        $this->assertArrayNotHasKey('line', $loc->export(1));
        $this->assertArrayNotHasKey('randomKey', $loc->export(1));
        $this->assertArrayNotHasKey('positionStart', $loc->export(1));
        $this->assertArrayNotHasKey('positionEnd', $loc->export(1));

        $loc = new TypeLocation(new TypeRelativePath('hello\\world'));
        $loc->setLine(100);
        $this->assertArrayHasKey('relativePath', $loc->export(1));
        $this->assertArrayHasKey('line', $loc->export(1));
        $this->assertArrayNotHasKey('positionStart', $loc->export(1));
        $this->assertArrayNotHasKey('positionEnd', $loc->export(1));

        $loc->setPositionStart(100);
        $this->assertArrayHasKey('positionStart', $loc->export(1));

        $loc->setPositionEnd(25);
        $this->assertArrayHasKey('positionEnd', $loc->export(1));

        $this->assertSame(((array) $loc->export(1))['positionStart'], 100);
        $this->assertSame(((array) $loc->export(1))['positionEnd'], 25);
        $this->assertSame(((array) $loc->export(1))['line'], 100);
        $this->assertSame(((array) $loc->export(1))['relativePath'], '/hello/world');
    }
}
