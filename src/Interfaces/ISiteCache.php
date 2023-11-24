<?php

namespace PhpScript\FastCache\Interfaces;

interface ISiteCache
{
    public function serve(): void;

    public function clean(): void;

    public function flush(): void;

    public function end(): void;
}
