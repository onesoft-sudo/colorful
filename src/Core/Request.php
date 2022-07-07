<?php

namespace OSN\Colorful\Core;

class Request
{
    public string $uri;
    public string $method;
    
    public function __construct(array $params = [])
    {
        $this->uri = $params['uri'] ?? "/";
        $this->method = $params['method'] ?? "GET";
    }
    
    protected static function parseURI()
    {
        $path = $_SERVER["REQUEST_URI"];
        $pos = strpos($path, "?");
        
        return $pos !== false ? substr($path, 0, $pos) : $path;
    }
    
    public static function capture(): static
    {
        return new static([
            "uri" => static::parseURI(),
            "method" => $_SERVER["REQUEST_METHOD"]
        ]);
    }
}