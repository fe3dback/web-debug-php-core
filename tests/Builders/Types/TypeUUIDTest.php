<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use WebDebug\Builders\Types\TypeUUID;

/**
 * Class TypeUUIDTest.
 */
class TypeUUIDTest extends TestCase
{
    public function testExport(): void
    {
        $cUuid = Uuid::uuid4()->toString();
        $guid = new TypeUUID($cUuid);

        $this->assertSame($cUuid, $guid->export(1));
    }

    /**
     * @throws \Exception
     */
    public function test__construct()
    {
        // auto gen and diff
        $guid1 = new TypeUUID();
        $guid2 = new TypeUUID();
        $this->assertIsString($guid1->getValue());
        $this->assertIsString($guid2->getValue());
        $this->assertNotSame($guid1->getValue(), $guid2->getValue());

        // custom
        $cUuid = Uuid::uuid4()->toString();
        $guid3 = new TypeUUID($cUuid);

        $this->assertSame($cUuid, $guid3->getValue());

        // check null
        $guid = new TypeUUID(null);
        $this->assertIsString($guid->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_constructException()
    {
        new TypeUUID('123');
    }
}
