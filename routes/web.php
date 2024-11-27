<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;


Route::get('/',[CrudController::class, 'index']);

Route::get('/add-todo',[CrudController::class, 'addTodo']);
Route::post('/store-todo',[CrudController::class, 'storeTodo']);

Route::get('/edit-todo/{id}',[CrudController::class, 'editTodo']);
Route::post('/update-todo/{id}',[CrudController::class, 'updateTodo']);

Route::get('/delete-todo/{id}',[CrudController::class, 'deleteTodo']);

