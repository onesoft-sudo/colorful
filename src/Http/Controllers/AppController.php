<?php

namespace OSN\Colorful\Http\Controllers;

use OSN\Colorful\Core\Controller;

class AppController extends Controller
{
    public function index()
    {
        return view("home");
    }
}