<?php

namespace Tests\Unit;

use App\Models\Todo;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /** @test */
    public function test_can_store_todo()
    {
        // Data to be sent in the request (can be dynamic or predefined)
        $data = [
            'title' => 'Learn Laravel Testing',
            'status' => 'pending',
            'due' => '2025-09-14',
        ];

        // Send a POST request to save the new todo
        $response = $this->postJson('https://127.0.0.1:8000/api/todo/create', $data);

        // Assert that the response is successful (status code 201 - created)
        $response->assertStatus(201);

        // Assert that the response contains the correct data
        $response->assertJson([
            'data' => [
                'title' => 'Learn Laravel Testing',
                'status' => 'pending',
                'due' => '2025-09-14',
            ]
        ]);

        // Optionally, check if the data is saved in the database
        $this->assertDatabaseHas('todos', [
            'title' => 'Learn Laravel Testing',
            'status' => 'pending',
            'due' => '2025-09-14',
        ]);
    }

    public function test_delete_todo_via_api()
    {
        // Create a todo to delete
        $todo = Todo::create([
            'title' => 'Test Todo',
            'status' => 'in-progress',
            'due' => '2025-09-25',
        ]);

        // Send a DELETE request to delete the todo
        $response = $this->deleteJson("https://127.0.0.1:8000/api/todo/delete/?id={$todo->id}");

        // Assert that the response is successful (status code 200 - OK)
        $response->assertStatus(200);

        // Assert that the response contains the correct message (if applicable)
        $response->assertJson([
            'message' => 'Todo deleted successfully.',
        ]);

        // Check if the todo is deleted from the database
        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
            'title' => 'Test Todo',
        ]);
    }

    public function test_get_data_from_api()
    {
        // Make a GET request to the API endpoint
        $response = $this->get('https://127.0.0.1:8000/api/todo/list'); // Replace with your API URL

        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);
        // Optionally, check if the response contains the expected data
        $response->assertJsonStructure([
            'data' => [
                '*' => [   // '*' indicates any item in the array
                    'id',
                    'title',
                    'status',
                    'due',
                ]
            ]
        ]);
    }
}
