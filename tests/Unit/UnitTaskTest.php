<?php

namespace Tests\Unit;

use App\Repositories\TaskRepository;
use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitTaskTest extends TestCase
{
    use RefreshDatabase;

    protected $taskRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = new TaskRepository();
    }

    public function test_get_all_tasks()
    {
        Task::factory()->count(3)->create();
        $tasks = $this->taskRepository->getAll();
        $this->assertCount(3, $tasks);
    }

    public function test_create_task()
    {
        $data = ['name' => 'Test Task'];
        $task = $this->taskRepository->create($data);
        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Test Task', $task->name);
    }

    public function test_find_task()
    {
        $task = Task::factory()->create();
        $foundTask = $this->taskRepository->find($task->id);
        $this->assertNotNull($foundTask);
        $this->assertEquals($task->id, $foundTask->id);
    }

    public function test_update_task()
    {
        $task = Task::factory()->create();
        $data = ['name' => 'Updated Task'];
        $updatedTask = $this->taskRepository->update($task->id, $data);
        $this->assertNotNull($updatedTask);
        $this->assertEquals('Updated Task', $updatedTask->name);
    }

    public function test_delete_task()
    {
        $task = Task::factory()->create();
        $result = $this->taskRepository->delete($task->id);
        $this->assertTrue($result);
        $this->assertNull(Task::find($task->id));
    }
}
