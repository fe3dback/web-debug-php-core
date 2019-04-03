<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeRelativePath;

/**
 * Class TypeRelativePathTest.
 */
class TypeRelativePathTest extends TestCase
{
    public function test__construct()
    {
        $rp = new TypeRelativePath('unix:\\Hello');
        $this->assertSame($rp->getValue(), '/unix:/Hello');
        $this->assertSame($rp->getValue(), $rp->export(1));

        $rp = new TypeRelativePath('/unix:/Hello');
        $this->assertSame($rp->getValue(), '/unix:/Hello');
    }
}
