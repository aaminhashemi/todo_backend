<?php

namespace App\Repositories;

use App\Models\Todo;
use Carbon\Carbon;

class TodoRepository
{
    public function save($data)
    {
        $todo = Todo::create([
            'title' => $data->title,
            'due' => Carbon::createFromFormat('Y/m/d', $data->due)->format('Y-m-d'),
            'status' => 'pending',
        ]);
        return $todo;
    }

    public function getAll()
    {
        return Todo::orderBy('id', 'DESC')->get();
    }

    public function getById($id)
    {
        return Todo::where('id', $id)->first();
    }

    public function delete($todo)
    {
        return $todo->delete();
    }

    public function UpdateStatus($todo, $status)
    {
        return $todo->update([
            'status' => $status
        ]);
    }

}
