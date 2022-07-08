<?php

namespace OSN\Colorful\Core;

class View
{
    public string $title = "";
        
    public function __construct(public string $name, public array $params = [], public ?string $layout = null)
    {
        if (!$this->layout) {
            $this->layout = App::$app->config->defaultLayout;
        }
    }
    
    public function viewDir(): string
    {
        return App::$app->config->rootDir . "/resources/views";
    }
    
    public function renderFile($name, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        
        $setTitle = function (string $title) {
            $this->title = $title;
        };
        
        $setLayout = function (string $name) {
            $this->layout = $name;
        };
        
        ob_start();
        
        if (!is_file($this->viewDir() . "/" . str_replace(".", "/", $name) . ".php")) {
            throw new \RuntimeException("Cannot find view \"{$name}\"", 255);
        }
        
        require($this->viewDir() . "/" . str_replace(".", "/", $name) . ".php");
        return ob_get_clean();
    }
    
    public function render()
    {
        $view = $this->renderFile($this->name, $this->params);
        return $this->renderFile($this->layout, ["content" => $view, "title" => $this->title]);
    }
    
    public function __toString()
    {
        return $this->render();
    }
}