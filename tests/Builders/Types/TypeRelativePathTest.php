<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeRelativePath;

class TypeRelativePathTest extends TestCase
{
    public function test__construct()
    {
        $rp = new TypeRelativePath('unix:\\Hello');
        $this->assertSame($rp->relativePath, '/unix:/Hello');
        $this->assertSame($rp->relativePath, $rp->export(1));

        $rp = new TypeRelativePath('/unix:/Hello');
        $this->assertSame($rp->relativePath, '/unix:/Hello');
    }
}
