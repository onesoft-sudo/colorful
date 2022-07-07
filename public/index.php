<?php

require __DIR__ . "/../vendor/autoload.php";

use OSN\Colorful\Core\App;

$app = new App([ 
    "root_dir" => dirname(__DIR__),
    ...require(__DIR__ . "/../config/app.php")
]);

require __DIR__ . "/../routes/main.php";

$app->run();