<?php

namespace OSN\Colorful\Http\Controllers;

use OSN\Colorful\Core\Controller;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware(\OSN\Colorful\Http\Middleware\TestMiddleware::class);
    }
    
    public function index()
    {
        return view("home");
    }
}