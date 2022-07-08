<?php

namespace OSN\Colorful\Core;

abstract class Middleware
{
    abstract public function handle(Request $request, callable $next);
}