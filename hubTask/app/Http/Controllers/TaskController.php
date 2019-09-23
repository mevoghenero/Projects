<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', 
        [
            'tasks' => $tasks
        ]);
        // return response()->json($tasks);
        // dd($tasks);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required'
        // ]);

        // $task = Task::create($request->all());

        // return response()->json([
        //     'message' => 'Great success! New task created',
        //     'task' => $task
        // ]);

        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return back()->with('status','Post created successfully.');
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
           'name' => 'nullable'
        ]);

        $task->update($request->all());

        return response()->json([
            'message' => 'Great success! Task updated',
            'task' => $task
        ]);
    }

    public function delete($id)
    {
        $task = Task::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Post deleted successful.');
    }
}