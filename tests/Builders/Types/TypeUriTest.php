<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeUri;

/**
 * Class TypeUriTest.
 */
class TypeUriTest extends TestCase
{
    public function test__construct()
    {
        $this->check('https://example.com/hello');
        $this->check('https://example.com');
        $this->check('/hello');
        $this->check('/hello?q=world');
    }

    /**
     * @param string $u
     */
    private function check(string $u)
    {
        $uri = new TypeUri($u);
        $this->assertSame($uri->getValue(), $u);
        $this->assertSame($uri->export(1), $u);
    }
}
