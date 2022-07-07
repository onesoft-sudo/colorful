<?php

namespace OSN\Colorful\Core;

class Config
{
    public string $rootDir = __DIR__ . "/../..";
    
    public function __construct(public array $raw)
    {
        $this->rootDir = $raw["root_dir"];
    }
}