<?php

namespace PhpScript\FastCache\Interfaces;

interface ICacheDriver
{
    public function getEngine(): IEngine;

    public function createCache(string $name): ICacheHandler;
}
