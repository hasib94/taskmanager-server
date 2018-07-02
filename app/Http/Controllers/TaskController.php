<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    function addTask(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        $task = new Task;
        $task->name = $request->name;
        // TODO: change auth id

        Auth::user()->tasks()->save($task);
        return json_encode(true);
    }

    function editTask(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $task = Auth::user()->tasks()->findOrFail($request->id);
        $task->name = $request->name;
        $task->save();
    }

    function getTask($id) {
        $task = Auth::user()->tasks()->findOrFail($id);
        return json_encode($task);
    }

    function getTasks() {
        $tasks = Auth::user()->tasks()->latest()->get();

        return json_encode($tasks);
    }

    function completeTask(Request $request) {
        $task = Auth::user()->tasks()->findOrFail($request->id);
        $task->complete = true;
        $task->save();
    }
    function deleteTask(Request $request) {
        $task = Auth::user()->tasks()->findOrFail($request->id);
        $task->delete();

        return json_encode(true);
    }
}
