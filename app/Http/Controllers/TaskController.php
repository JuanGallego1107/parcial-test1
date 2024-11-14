<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all(), 200);
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 200);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->update($request->all());
            return response()->json($task, 200);
        }
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json(['message' => 'Task deleted'], 200);
        }
        return response()->json(['message' => 'Task not found'], 404);
    }
}

