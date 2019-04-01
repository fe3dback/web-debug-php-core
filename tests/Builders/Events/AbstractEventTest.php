<?php

namespace Tests\Builders\Events;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Events\AbstractEvent;
use WebDebug\Builders\Events\EventLog;

class AbstractEventTest extends TestCase
{
    public function test__construct()
    {
        $e = new EventLog('Hello world');

        $this->assertIsArray($e->getPayload(1));
        $data = $e->export(1);

        $this->assertIsInt($data['importance']);
        $this->assertIsInt($data['time']);
        $this->assertSame($data['type'], AbstractEvent::EVENT_TYPE_LOG);

        $this->assertNotTrue(isset($data['duration']));
        $this->assertNotTrue(isset($data['context']));
        $this->assertNotTrue(isset($data['success']));
        $this->assertNotTrue(isset($data['definedIn']));
        $this->assertNotTrue(isset($data['calledFrom']));
    }
}
