<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeImportance;

/**
 * Class TypeImportanceTest.
 */
class TypeImportanceTest extends TestCase
{
    public function test__construct()
    {
        $imp = new TypeImportance(0);
        $this->assertSame(1, $imp->getValue());

        $imp = new TypeImportance(TypeImportance::CRITICAL);
        $this->assertSame(6, $imp->getValue());

        $imp = new TypeImportance(25);
        $this->assertSame(8, $imp->getValue());

        $this->assertSame($imp->getValue(), $imp->export(1));
    }
}
