<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Simple\ArrayCache;
use WebDebug\Builders\EventCollection;
use WebDebug\Builders\Events\EventLog;
use WebDebug\Profiler;

/**
 * Class ProfilerTest.
 */
class ProfilerTest extends TestCase
{
    /**
     * @return Profiler
     */
    private static function makeProfiler(): Profiler
    {
        $cache = new ArrayCache();

        return new Profiler(Profiler::VERSION_1, $cache, false);
    }

    public function test__construct()
    {
        $profiler = self::makeProfiler();
        $uuid = $profiler->push();
        $this->assertIsString($uuid);
        $this->assertSame($profiler->uuid->uuid, $uuid);
    }

    public function testPushAndPop()
    {
        $profiler = self::makeProfiler();
        $log = new EventLog('Hello world');
        $log->message = 'NewMessage';

        $profiler->addEvent($log);

        $id = $profiler->push();
        $json = $profiler->pop($id); // return json and delete cache
        $null = $profiler->pop($id); // so, now this is null

        $this->assertJson((string) $json);
        $this->assertNull($null);

        // check json
        $data = json_decode((string) $json);
        $this->assertSame($data->events[0]->payload->message, 'NewMessage');
    }

    public function testAddEvent()
    {
        $profiler = self::makeProfiler();
        $log = new EventLog('Hello world');

        $collection = $profiler->getEventCollection();

        $profiler->addEvent($log);
        $this->assertSame(1, $collection->count());

        $profiler->addEvent($log);
        $this->assertSame(2, $collection->count());

        // -- check inside

        $logB = $collection->first();
        $this->assertSame($log, $logB);
        $this->assertSame('Hello world', $logB->message);
    }

    public function testGetEventCollection()
    {
        $profiler = self::makeProfiler();

        $this->assertIsString($profiler->uuid->uuid);
        $this->assertInstanceOf(EventCollection::class, $profiler->getEventCollection());
        $this->assertCount(0, $profiler->getEventCollection()->toArray());
    }

    public function testNothingAtProduction()
    {
        $profiler = self::makeProfiler();
        $profiler->isProductionMode = true;
        $uuid = $profiler->push();
        $this->assertNull($profiler->pop($uuid));
    }
}
