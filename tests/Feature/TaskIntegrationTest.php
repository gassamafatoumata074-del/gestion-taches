<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_is_saved_in_database(): void
    {
        $task = Task::create([
            'title' => 'Tâche enregistrée',
            'description' => 'Test de sauvegarde en base',
            'completed' => false,
        ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Tâche enregistrée',
            'description' => 'Test de sauvegarde en base',
        ]);
    }

    public function test_task_can_be_updated_in_database(): void
    {
        $task = Task::create([
            'title' => 'Ancienne tâche',
            'description' => 'Ancienne description',
            'completed' => false,
        ]);

        $task->update([
            'title' => 'Tâche modifiée',
            'completed' => true,
        ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Tâche modifiée',
            'completed' => true,
        ]);
    }

    public function test_task_can_be_deleted_from_database(): void
    {
        $task = Task::create([
            'title' => 'Tâche à supprimer',
            'description' => 'Test de suppression en base',
            'completed' => false,
        ]);

        $task->delete();

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}