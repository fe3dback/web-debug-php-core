<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeTagMultipart;

/**
 * Class TypeTagMultipartTest.
 */
class TypeTagMultipartTest extends TestCase
{
    public function test__construct()
    {
        $type = new TypeTagMultipart('db', 'mysql');
        $this->assertSame($type->getValue(), sprintf('%s:%s', 'db', 'mysql'));
        $this->assertSame($type->export(1), $type->getValue());
    }
}
