<?php

namespace Tests\Unit;

use App\Models\Todo;
use Tests\TestCase;

class TodoTest extends TestCase
{
    #[Test]
    public function test_update_todo()
    {
        $todo = Todo::factory()->create();
        $possibleStatuses=['pending', 'completed', 'in-progress'];
        $status=null;
        foreach ($possibleStatuses as $item){
            if($item!=$todo->status){
                $status=$item;
            }
        }
        $response = $this->postJson(route('api_update_todo', ['id'=>$todo->id,'status'=>$status]));
        $response->assertStatus(200);
    }
    #[Test]
    public function test_delete_todo()
    {
        $todo = Todo::factory()->create();
        $response = $this->postJson(route('api_delete_todo', ['id'=>$todo->id]));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }
    #[Test]
    public function test_get_todos()
    {
        $response = $this->getJson(route('api_list_todo'));
        $response->assertStatus(200);
    }

}
