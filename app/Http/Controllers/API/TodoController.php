<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function save(Request $request)
    {
        try {
            $insert = Todo::create([
                'title' => $request->title,
                'due' => str_replace('/', '-', $request->due),
                'status' => 'pending',
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Dump the error message
        }
        if ($insert){
            return response()->json(['data'=>$insert],Response::HTTP_CREATED);
        }else{
            return response()->json([],Response::HTTP_NOT_ACCEPTABLE);
        }

    }

    public function index()
    {
        $todos=Todo::all();
        return response()->json(['data' => $todos]);
    }

    public function delete(Request $request)
    {
        $todo=Todo::where('id',$request->id)->first();
        if ($todo){
            $todo->delete();
            return response()->json(['message' => 'Todo deleted successfully.'],Response::HTTP_OK);
        }
        return response()->json([],Response::HTTP_NOT_ACCEPTABLE);
    }

    public function Update(Request $request)
    {
        $todo=Todo::where('id',$request->id)->first();
        if ($todo){
            $todo->update([
                'status'=>$request->status
            ]);
            return response()->json(['message' => 'Todo updated successfully.'],Response::HTTP_OK);
        }
        return response()->json([],Response::HTTP_NOT_ACCEPTABLE);
    }
}
