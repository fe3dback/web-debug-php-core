<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeMethod;

/**
 * Class TypeMethodTest.
 */
class TypeMethodTest extends TestCase
{
    public function test__construct()
    {
        $m = new TypeMethod('get');
        $this->assertSame($m->getValue(), 'GET');
        $this->assertSame($m->getValue(), $m->export(1));
    }
}
