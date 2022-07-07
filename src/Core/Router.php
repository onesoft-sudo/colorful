<?php

namespace OSN\Colorful\Core;

class Router
{
    public array $routes = [];
    
    public function __construct(protected Request $request)
    {
        
    }
    
    public function get(string $route, callable|array $callback)
    {
        $this->routes["GET"][$route] = $callback;
    }
    
    public function post(string $route, callable|array $callback)
    {
        $this->routes["POST"][$route] = $callback;
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
        
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        
        return call_user_func($callback, $this->request);
    }
}