<?php

namespace Tests\Unit;

use App\Models\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function test_task_can_be_created_with_expected_attributes(): void
    {
        $task = new Task([
            'title' => 'Faire les tests',
            'description' => 'Tester l’application Laravel',
            'completed' => false,
        ]);

        $this->assertSame('Faire les tests', $task->title);
        $this->assertSame('Tester l’application Laravel', $task->description);
        $this->assertFalse($task->completed);
    }

    public function test_task_completed_attribute_is_boolean(): void
    {
        $task = new Task([
            'title' => 'Test terminé',
            'completed' => true,
        ]);

        $this->assertIsBool($task->completed);
        $this->assertTrue($task->completed);
    }
}