<?php

use OSN\Colorful\Http\Controllers\AppController;

$app->router->get("/", [AppController::class, "index"]);