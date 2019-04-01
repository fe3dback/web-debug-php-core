<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeImportance;

class TypeImportanceTest extends TestCase
{
    public function test__construct()
    {
        $imp = new TypeImportance(0);
        $this->assertSame(1, $imp->importance);

        $imp = new TypeImportance(TypeImportance::CRITICAL);
        $this->assertSame(6, $imp->importance);

        $imp = new TypeImportance(25);
        $this->assertSame(8, $imp->importance);

        $this->assertSame($imp->importance, $imp->export(1));
    }
}
