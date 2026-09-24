<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_tasks_page_is_accessible(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function test_user_can_create_a_task(): void
    {
        $response = $this->post('/tasks', [
            'title' => 'Nouvelle tâche',
            'description' => 'Description de la tâche',
        ]);

        $response->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', [
            'title' => 'Nouvelle tâche',
            'description' => 'Description de la tâche',
        ]);
    }

    public function test_title_is_required_when_creating_a_task(): void
    {
        $response = $this->post('/tasks', [
            'title' => '',
            'description' => 'Sans titre',
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_user_can_complete_a_task(): void
    {
        $task = Task::create([
            'title' => 'Tâche à terminer',
            'description' => 'Test de validation',
            'completed' => false,
        ]);

        $response = $this->patch("/tasks/{$task->id}/complete");

        $response->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'completed' => true,
        ]);
    }

    public function test_user_can_delete_a_task(): void
    {
        $task = Task::create([
            'title' => 'Tâche à supprimer',
            'description' => 'Test de suppression',
            'completed' => false,
        ]);

        $response = $this->delete("/tasks/{$task->id}");

        $response->assertRedirect('/tasks');

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}