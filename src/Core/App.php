<?php

namespace OSN\Colorful\Core;

class App
{
    public Router $router;
    public Config $config;
    public Request $request;
    public static self $app;
    
    public function __construct(array $config)
    {
        static::$app = $this;
        $this->config = new Config($config);
        $this->request = Request::capture();
        $this->router = new Router($this->request);
    }
    
    public function run()
    {
        echo $this->router->resolve();
    }
}