<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Redis;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll()
    {
        return Task::all();
    }

    public function find($id)
    {
        return Task::find($id);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update($id, array $data)
    {
        $task = $this->find($id);
        if ($task) {
            $task->update($data);
            return $task;
        }
        return null;
    }

    public function delete($id)
    {
        $task = $this->find($id);
        if ($task) {
            $task->delete();
            return true;
        }
        return false;
    }

    public function taskExistsInRedis(int $taskId): bool
    {
        // Define a unique Redis key for the task
        $redisKey = "task:{$taskId}";

        // Check if the key exists in Redis
        return Redis::exists($redisKey) > 0;
    }
}
