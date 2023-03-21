<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function list(): string
    {
        return 'Here are all the tasks...';
    }

    public function create(Request $request)
    {
        $input = $request->all();
        // echoes nicely formatted data 
        // and calls PHP's die() which stops further processing
        dd($input);
    }

    public function update($id, Request $request)
    {
        $updatedFields = $request->all();
        $newTitle = $updatedFields['title'];
        return "Updating task $id title to '$newTitle'";
    }
}
