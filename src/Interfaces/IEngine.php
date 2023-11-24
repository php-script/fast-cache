<?php

namespace PhpScript\FastCache\Interfaces;

interface IEngine
{
    public function newCache(string $name): ICacheHandler;

    public function flush(): void;
}
