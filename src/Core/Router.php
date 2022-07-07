<?php

namespace OSN\Colorful\Core;

class Router
{
    public array $routes = [];
    
    public function __construct(protected Request $request)
    {
        
    }
    
    public function resolve()
    {
        $uri = $this->request->uri;
        $method = $this->request->method;
        
        $callback = $this->routes[$method][$uri] ?? null;
        
        if (!$callback) {
            header("HTTP/1.1 404 Not Found");
            return "404 Not Found";
        }
        
        return call_user_func($callback, $this->request);
    }
}