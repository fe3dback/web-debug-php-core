<?php

declare(strict_types=1);

namespace WebDebug;

use PHPUnit\Framework\TestCase;
use Str\Str;
use WebDebug\Internal\VoidCache;


/**
 * Class ProfilerTest
 * @package WebDebug
 */
class ProfilerTest extends TestCase
{
    /**
     * @var Profiler
     */
    private $profiler;

    protected function setUp()
    {
        $this->profiler = new Profiler(new VoidCache());
    }

    public function testGetBuilderV1()
    {
        self::assertEquals(1, $this->profiler->getBuilderV1()->getVersion());
    }

    public function testGetId()
    {
        self::assertTrue(Str::make($this->profiler->getId())->isUUIDv4(), 'Id should be UUID v4');
    }
}