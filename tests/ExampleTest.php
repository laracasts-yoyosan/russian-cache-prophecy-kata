<?php

use Model\Car;

class ExampleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_normalizes_a_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());

        $cache->has('cache-key')->shouldBeCalled();

        $directive->setUp('cache-key');
    }

    /**
     * @test
     */
    public function it_normalizes_a_cacheable_model()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());

        $cache->has(Car::CACHE_KEY)->shouldBeCalled();

        $directive->setUp(new Car);
    }

    /**
     * @test
     */
    public function it_normalizes_a_collection()
    {
        $collection = ['foo', 'bar'];

        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());

        $cache->has(md5(implode($collection)))->shouldBeCalled();
        
        $directive->setUp($collection);
    }
}
