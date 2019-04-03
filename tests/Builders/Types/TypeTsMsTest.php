<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeTsMs;

/**
 * Class TypeTsMsTest.
 */
class TypeTsMsTest extends TestCase
{
    public function testExport()
    {
        $ts = new TypeTsMs();
        $this->assertIsFloat($ts->getValue());
        $this->assertIsInt($ts->export(1));
    }
}
