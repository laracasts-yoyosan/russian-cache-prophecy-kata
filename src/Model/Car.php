<?php

namespace Model;

class Car
{
    const CACHE_KEY = 'car-cache-key';

    public function getCacheKey()
    {
        return self::CACHE_KEY;
    }
}