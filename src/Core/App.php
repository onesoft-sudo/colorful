<?php

namespace OSN\Colorful\Core;

class App
{
    public Router $router;
    public Config $config;
    public Request $request;
    
    public function __construct(array $config)
    {
        $this->config = new Config($config);
        $this->request = Request::capture();
        $this->router = new Router($this->request);
    }
    
    public function run()
    {
        echo $this->router->resolve();
    }
}