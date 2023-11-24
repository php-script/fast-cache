<?php

namespace PhpScript\FastCache;

use PhpScript\FastCache\Drivers\FastCacheDriver;
use PhpScript\FastCache\Interfaces\ICache;
use PhpScript\FastCache\Interfaces\ICacheDriver;
use PhpScript\FastCache\Interfaces\ICacheHandler;

class Cache implements ICache
{
    public static Cache $instance;

    protected ICacheDriver $Driver;

    public function __construct(?ICacheDriver $Driver = null)
    {
        $this->setDriver($Driver ?: new FastCacheDriver);
    }

    public static function init(...$args): Cache
    {
        return self::$instance = new Cache(...$args);
    }

    public function setDriver(ICacheDriver $Driver): self
    {
        $this->Driver = $Driver;
        return $this;
    }

    public function create(...$args): ICacheHandler
    {
        return $this->getDriver()
            ->createCache(...$args);
    }

    public function getDriver(): ICacheDriver
    {
        return $this->Driver;
    }
}
