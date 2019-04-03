<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeDurationMs;

/**
 * Class TypeDurationMsTest.
 */
class TypeDurationMsTest extends TestCase
{
    public function test__construct()
    {
        $d = new TypeDurationMs(100);
        $this->assertSame($d->getValue(), 100);
        $this->assertSame($d->export(1), 100);
        $this->assertIsInt($d->export(1));
    }
}
