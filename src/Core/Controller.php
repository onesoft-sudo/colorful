<?php

namespace OSN\Colorful\Core;

class Controller 
{
    /** @var Middleware[] */
    public array $middleware = [];
    
    public function middleware(Middleware|string $middleware)
    {
        if (is_string($middleware))
            $middleware = new $middleware();
            
        $this->middleware[] = $middleware;
    }
}