<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeTagFlag;

class TypeTagFlagTest extends TestCase
{
    public function test__construct()
    {
        $type = new TypeTagFlag('is_prod');
        $this->assertSame($type->tag, 'is_prod');
        $this->assertSame($type->tag, $type->export(1));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_notMultipart()
    {
        $type = new TypeTagFlag('g:v');
    }
}
