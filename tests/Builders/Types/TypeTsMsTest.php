<?php

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeTsMs;

class TypeTsMsTest extends TestCase
{
    public function testExport()
    {
        $ts = new TypeTsMs();
        $this->assertIsFloat($ts->time);
        $this->assertIsInt($ts->export(1));
    }
}
