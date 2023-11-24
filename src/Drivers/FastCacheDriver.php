<?php

namespace PhpScript\FastCache\Drivers;

use PhpScript\FastCache\Engine\SimpleCache\SimpleCache;
use PhpScript\FastCache\Interfaces\ICacheDriver;
use PhpScript\FastCache\Interfaces\ICacheHandler;
use PhpScript\FastCache\Interfaces\IEngine;

class FastCacheDriver implements ICacheDriver
{
    protected IEngine $engine;

    public function __construct(array $setup = [])
    {
        $this->engine = new SimpleCache($setup);
    }

    public function createCache(string $name): ICacheHandler
    {
        return $this->getEngine()
            ->newCache($name);
    }

    public function getEngine(): IEngine
    {
        return $this->engine;
    }
}
