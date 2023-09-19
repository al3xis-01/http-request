<?php

namespace Tests;

use Yolanda\Http\Request\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    /**
     * @covers \Yolanda\Http\Request\Collection::set
     * @return void
     */
    public function testSet()
    {
        $collection =   new Collection();

        $collection->set('A','A');

        $this->assertTrue($collection->has('A'));
        $this->assertFalse($collection->has('B'));
    }

    /**
     * @covers \Yolanda\Http\Request\Collection::all
     *
     * @return void
     */
    public function testAll()
    {
        $collection =   new Collection();

        $collection->set('A','A');
        $collection->set('B','B');
        $collection->set('C','C');

        $all    =   $collection->all();
        $result =   [
            'A' =>  'A',
            'B' =>  'B',
            'C' =>  'C',
        ];
        $this->assertEquals($all, $result);

        $result['D']    =   'D';
        $this->assertNotEquals($all, $result);
    }

    /**
     * @covers \Yolanda\Http\Request\Collection::remove
     *
     * @return void
     */
    public function testRemove()
    {
        $collection =   new Collection();

        $collection->set('A','A');
        $collection->set('B','B');
        $collection->set('C','C');

        $all    =   $collection->all();
        $this->assertArrayHasKey('A', $all);

        $collection->remove('A');

        $all    =   $collection->all();
        $this->assertArrayNotHasKey('A', $all);

    }

    /**
     * @covers \Yolanda\Http\Request\Collection::keys
     *
     * @return void
     */
    public function testKeys()
    {
        $collection =   new Collection();

        $collection->set('A','A');
        $collection->set('B','B');
        $collection->set('C','C');

        $keys   =   $collection->keys();
        $result =   [
            'A',
            'B',
            'C'
        ];

        $this->assertEquals($keys, $result);

    }

    /**
     * @covers \Yolanda\Http\Request\Collection::has
     *
     * @return void
     */
    public function testHas()
    {
        $collection =   new Collection();

        $collection->set('A','A');

        $this->assertTrue($collection->has('A'));
    }

    /**
     * @covers \Yolanda\Http\Request\Collection::count
     *
     * @return void
     */
    public function testCount()
    {
        $collection =   new Collection();
        $size   =   10;
        for ($i = 0; $i < $size; $i++) {
            $collection->set($i, $i);
        }

        $this->assertEquals($size, $collection->count());

    }

}
