<?php

use App\Http\Controllers\API\TodoController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/todo/create', [TodoController::class,'save'])->name('api_create_todo');
Route::get('/todo/list', [TodoController::class,'index'])->name('api_list_todo');
Route::post('/todo/update', [TodoController::class,'update'])->name('api_update_todo');
Route::post('/todo/delete', [TodoController::class,'delete'])->name('api_delete_todo');
