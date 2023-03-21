<?php

namespace App\Http\Controllers;

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
