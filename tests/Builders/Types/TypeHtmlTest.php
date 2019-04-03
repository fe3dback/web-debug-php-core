<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeHtml;

/**
 * Class TypeHtmlTest.
 */
class TypeHtmlTest extends TestCase
{
    public function test__construct()
    {
        $probe = '<b>Hello world</b>';
        $h = new TypeHtml($probe);
        $this->assertSame($h->export(1), $probe);
        $this->assertSame($h->getValue(), $probe);
    }
}
