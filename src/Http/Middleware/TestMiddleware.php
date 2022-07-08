<?php

namespace OSN\Colorful\Http\Middleware;

use OSN\Colorful\Core\Request;
use OSN\Colorful\Core\Response;
use OSN\Colorful\Core\Middleware;

class TestMiddleware extends Middleware
{
    public function handle(Request $request, callable $next)
    {
        //if (true)
            return new Response(403, "Forbidden", "Forbidden");
            
        $next($request);
    }
}