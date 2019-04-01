<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeTagMultipart;

class TypeTagMultipartTest extends TestCase
{
    public function test__construct()
    {
        $type = new TypeTagMultipart('db', 'mysql');
        $this->assertSame($type->tag, sprintf('%s:%s', 'db', 'mysql'));
        $this->assertSame($type->export(1), $type->tag);
    }
}
