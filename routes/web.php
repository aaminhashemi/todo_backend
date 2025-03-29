<?php

use App\Http\Controllers\API\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[TodoController::class,'index']);
Route::post('/api/todo/create', [TodoController::class,'save']);
Route::get('/api/todo/list', [TodoController::class,'index']);
Route::post('/api/todo/update', [TodoController::class,'update']);
Route::delete('/api/todo/delete', [TodoController::class,'delete']);
Route::delete('/api/todo/delete', [TodoController::class,'delete']);
Route::get('/test', function () {
    return 'Test route works!';
});
