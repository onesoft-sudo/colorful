<?php

use OSN\Colorful\Core\View;

function view(string $name, array $params = []): View
{
    return new View($name, $params);
}