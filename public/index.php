<?php

require __DIR__ . "/../vendor/autoload.php";

use OSN\Colorful\Core\App;

$app = new App([
    "root_dir" => dirname(__DIR__)    
]);

$app->run();