<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingController extends Controller
{

    public function greetDefault()
    {
        return 'Hello, world';
    }

    public function greetName($name)
    {
        return "Hello, $name";
    }
}
