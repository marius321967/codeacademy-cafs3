<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function list()
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function listUsersTasks(string $id)
    {
        $user = User::find($id);
        $tasks = $user->tasks;

        return view('home', ['tasks' => $tasks, 'user' => $user]);
    }

    public function listAllCompleted()
    {
        // $tasks = Task::where('is_completed', true)->get();
        $tasks = Task::completed()->get();
        return $tasks;
    }

    public function find($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.view', ['task' => $task]);
    }

    public function create(Request $request)
    {
        $input = $request->all();

        Task::create($input);
    }

    public function update($id, Request $request)
    {
        // $task = Task::find($id);
        // $fieldsToUpdate = $request->all();
        // $task->title = $fieldsToUpdate['title'];
        // $task->deadline = $fieldsToUpdate['deadline'];
        // $task->save();
        $fieldsToUpdate = $request->all();

        Task::where('is_completed', $id)
            ->update([
                'title' => $fieldsToUpdate['title'],
                'deadline' => $fieldsToUpdate['deadline']
            ]);
    }

    public function markCompleted($id, Request $request)
    {
        $task = Task::find($id);
        $task->is_completed = true;
        $task->save();
    }

    public function delete($id)
    {
        Task::destroy($id);
    }
}
