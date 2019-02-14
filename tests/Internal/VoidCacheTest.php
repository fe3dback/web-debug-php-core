<?php

declare(strict_types=1);

namespace WebDebug\Internal;

use PHPUnit\Framework\TestCase;


/**
 * Class VoidCacheTest
 * @package WebDebug\Internal
 */
class VoidCacheTest extends TestCase
{
    /**
     * @var VoidCache
     */
    private $cache;

    protected function setUp()
    {
        $this->cache = new VoidCache();
    }

    public function testGet()
    {
        self::assertEquals($this->cache->get('test'), null);
    }

    public function testSet()
    {
        self::assertEquals($this->cache->set('test', 123), true);
    }

    public function testDeleteMultiple()
    {
        self::assertEquals($this->cache->deleteMultiple(['a', 'b']), true);
    }

    public function testSetMultiple()
    {
        self::assertEquals($this->cache->setMultiple(['a' => 1, 'b' => 2]), true);
    }

    public function testDelete()
    {
        self::assertEquals($this->cache->delete('a'), true);
    }

    public function testHas()
    {
        self::assertEquals($this->cache->set('a', 12345), true);
        self::assertEquals($this->cache->has('a'), false);
    }

    public function testClear()
    {
        self::assertEquals($this->cache->clear(), true);
    }

    public function testGetMultiple()
    {
        self::assertEquals($this->cache->getMultiple(['a', 'b']), ['a' => null, 'b' => null]);
    }
}