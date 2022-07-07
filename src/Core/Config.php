<?php

namespace OSN\Colorful\Core;

class Config
{
    public string $rootDir = __DIR__ . "/../..";
    public string $defaultLayout;
    
    public function __construct(public array $raw)
    {
        $this->rootDir = $raw["root_dir"];
        $this->defaultLayout = $raw["default_layout"];
    }
}