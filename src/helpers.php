<?php

use PhpScript\FastCache\Cache;
use PhpScript\FastCache\Drivers\FastCacheDriver;
use PhpScript\FastCache\Engine\SimpleCache\SimpleCacheHandler;
use PhpScript\FastCache\Interfaces\ICache;
use PhpScript\FastCache\Interfaces\ICacheDriver;
use PhpScript\FastCache\Interfaces\ICacheHandler;
use PhpScript\FastCache\Interfaces\IEngine;
use PhpScript\FastCache\Interfaces\ISiteCache;
use PhpScript\FastCache\SiteCache;

if (!function_exists('cache_init')) {
    function cache_init($cacheConfig = []): ICache
    {
        return Cache::init(new FastCacheDriver($cacheConfig));
    }
}

if (!function_exists('cache_create')) {
    function cache_create(?ICacheDriver $Driver = null): ICache
    {
        return new Cache($Driver);
    }
}

if (!function_exists('cache')) {
    function cache(string $name = 'default'): ICacheHandler
    {
        return Cache::$instance->create($name);
    }
}

if (!function_exists('cache_driver')) {
    function cache_driver(): ICacheDriver
    {
        return Cache::$instance->getDriver();
    }
}

if (!function_exists('cache_engine')) {
    function cache_engine(): IEngine
    {
        return Cache::$instance->getDriver()->getEngine();
    }
}

if (!function_exists('cache_handler')) {
    function cache_handler(string $filepath): ICacheHandler
    {
        return new SimpleCacheHandler($filepath);
    }
}

if (!function_exists('init_site_cache')) {
    function init_site_cache(...$args): ISiteCache
    {
        return SiteCache::setup(...$args);
    }
}

if (!function_exists('start_site_cache')) {
    function start_site_cache(): void
    {
        SiteCache::$instance->serve();
    }
}

if (!function_exists('end_site_cache')) {
    function end_site_cache(): void
    {
        SiteCache::$instance->end();
    }
}
