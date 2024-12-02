<?php

namespace App\Http\Controllers;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        return response()->json($this->taskRepository->getAll(), 200);
    }

    public function store(Request $request)
    {
        $task = $this->taskRepository->create($request->all());
        return response()->json($task, 200);
    }

    public function show($id)
    {
        $task = $this->taskRepository->find($id);
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $task = $this->taskRepository->update($id, $request->all());
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function destroy($id)
    {
        if ($this->taskRepository->delete($id)) {
            return response()->json(['message' => 'Task deleted'], 200);
        }
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function checkTaskInRedis(int $taskId)
    {
        // Use the service to check if the task exists in Redis
        $exists = $this->taskRepository->taskExistsInRedis($taskId);

        return response()->json([
            'taskId' => $taskId,
            'existsInRedis' => $exists,
        ]);
    }
}
