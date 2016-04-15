<?php

class BladeDirective
{
    protected $cache;

    public function __construct(RussianCache $cache)
    {
        $this->cache = $cache;
    }

    public function setUp($item)
    {
        $this->cache->has(
            $this->normalize($item)
        );
    }

    protected function normalize($item)
    {
        if (is_object($item) && method_exists($item, 'getCacheKey')) {
            return $item->getCacheKey();
        }

        if (is_array($item)) {
            return md5(implode($item));
        }

        return $item;
    }
}
