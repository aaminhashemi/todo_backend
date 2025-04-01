<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Repositories\TodoRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    protected $repository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->repository = $todoRepository;
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'due' => 'required|date_format:Y/m/d',
            'title' => 'required|string|max:255',
        ]);
        if ($validator->passes()) {
            $newTodo = $this->repository->save($request);
            return ($newTodo) ? response()->json(['data' => $newTodo], Response::HTTP_CREATED) : response()->json([], Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            return response()->json([], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function index()
    {
        $todos = $this->repository->getAll();
        return response()->json(['data' => $todos], Response::HTTP_OK);
    }

    public function delete(Request $request)
    {
        $todo = $this->repository->getById($request->id);
        if ($todo) {
            $this->repository->delete($todo);
            return response()->json(['message' => 'Todo deleted successfully.'], Response::HTTP_OK);
        }
        return response()->json(['message' => 'Todo not found.'], Response::HTTP_NOT_FOUND);
    }

    public function Update(Request $request)
    {
        $todo = $this->repository->getById($request->id);
        if ($todo) {
            $this->repository->UpdateStatus($todo, $request->status);
            return response()->json(['message' => 'Todo updated successfully.'], Response::HTTP_OK);
        }
        return response()->json(['message' => 'Todo not found.'], Response::HTTP_NOT_FOUND);
    }
}
