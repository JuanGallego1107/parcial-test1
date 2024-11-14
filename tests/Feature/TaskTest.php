<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    // Si quieres una base de datos limpia en cada prueba, descomenta esta línea:
    // use RefreshDatabase;

    /**
     * Prueba para listar todas las tareas.
     */
    public function test_get_all_tasks()
    {
        // Crear algunas tareas de prueba
        Task::factory()->count(3)->create();

        $response = $this->get('/tasks');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'id',
                         'name',
                     ]
                 ]);
    }

    /**
     * Prueba para crear una tarea.
     */
    public function test_create_task()
    {
        $data = [
            'name' => 'Nueva tarea de prueba'
        ];

        $response = $this->post('/tasks', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    /**
     * Prueba para obtener una tarea por ID.
     */
    public function test_get_task_by_id()
    {
        $task = Task::factory()->create();

        $response = $this->get("/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $task->id,
                     'name' => $task->name,
                 ]);
    }
    /**
     * Prueba para actualizar una tarea.
     */
    public function test_update_task()
    {
        $task = Task::factory()->create();

        $data = [
            'name' => 'Tarea actualizada'
        ];

        $response = $this->put("/tasks/{$task->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    /**
     * Prueba para eliminar una tarea.
     */
    public function test_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete("/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Task deleted'
                 ]);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
