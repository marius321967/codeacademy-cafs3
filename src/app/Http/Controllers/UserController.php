<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function list()
    {
        return User::all();
    }
}
